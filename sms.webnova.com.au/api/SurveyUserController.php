<?php

class SurveyUserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','GiftNumber','lottery','confirmPrizeWinning'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SurveyUser;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$provide_gift_number = $_POST['provide_gift_number'];
		
		$lottery_numbers = $_POST['lottery_numbers'];
		
		$user_id=yii::app()->user->id;
		
		if(isset($_POST['SurveyUser']))
		{
			$model->attributes=$_POST['SurveyUser'];
			
			if(empty($lottery_numbers)){
			
				$this->redirect(array('create','errorId'=>1));//1:为抽奖数为空的时候返回页面提示
			}
			
			//获取电话
			$moble = SurveyUser::model()->getGiftNumber($model->activety_code,$user_id);
			
			if(!empty($moble)){
			
			for ($j=0;$j<count($moble);$j++){
				$mobles[$j]= $moble[$j]['mobile'];	//把数组转换成arra('0'=>1212)格式
			}
		
		
			$result = array_rand($mobles,$lottery_numbers>count($mobles)?count($mobles):$lottery_numbers);	//随机取出数组中的键值,如果只取出一个,返回的是一个随机的键值数.
			
			if(count($result) > 1){//array_rand 函数只有一个值的时候,不是数组
				array_unique($result); //去除数组中重复的键值
			}
			for ($i=0;$i<count($result);$i++){
				//如果 count($result) 等于 1 , $result的结果就是一个随机键值,是整数,所以不能循环
				if(count($result) == 1){
					$unms = $result;
				}else{
					$unms = $result[$i];
				}

				//把取出值的记录标记为已中奖
				$rs = SurveyUser::model()->setLotteryUserStatus($mobles[$unms],$user_id);
				
				$suid = SurveyUser::model()->getSuid($mobles[$unms],$user_id);
				
				$models = SurveyUser::model()->findByPk($suid);
				
// 				if($currentLang == "en"){
					$url="http://prepaidselect.com/surveysen3.php?s=".base64_encode($suid);
// 				}else{
// 					$url="http://prepaidselect.com/surveys3.php?s=".base64_encode($suid);
// 				}
				
				
				//发送EMAIL.
				//$i = SurveyUser::model()->sendEmail($models->email,$models->first_name,$url);
				//根据当前系统的语言发送给用户是否中文还是英文
				$post_data = array(
							'method' =>"sendMessages",
							'username' =>"abc",
							'password' =>"123456",
							'mobile' =>$mobles[$unms],
							'api_id' =>53,
							'text' =>'Congratulations! You have won a prize for the Netcube July Promotion. Please check the email you registered for further instructions on claiming your prize!'
					);
				/*}*/
				
				//这里做短信发送,发送短信的时候,要从zy_gift_password 中 抽取一个 随机密码,发送到客户手机,还有领奖地址
				$url = "http://sms.webnova.com.au/api/webnova_sms_api_lib.php";
				
				$ch = curl_init();
				
				curl_setopt($ch,CURLOPT_URL,$url );
				
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
					
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
				
				curl_setopt($ch, CURLOPT_POST, 1);
				
				// 把post的变量加上
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
				
				$output = curl_exec($ch);
				
				//调试使用
				if ($output === FALSE) {
						
					$output="cURL Error: " . curl_error($ch);
				
				}
				curl_close($ch);
				//短信发送结束----------------------------------------
			}

			if($i)
				$this->redirect(array('admin','id'=>$model->suid));
		}else{
			$this->redirect(array('create','errorId'=>2));
		}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveyUser']))
		{
			$model->attributes=$_POST['SurveyUser'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->suid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SurveyUser');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SurveyUser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SurveyUser']))
			$model->attributes=$_GET['SurveyUser'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SurveyUser the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SurveyUser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SurveyUser $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='survey-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//根据code获取此活动中的设置礼品数
	public function actionGiftNumber(){
		$activity_code = isset($_GET['code'])? $_GET['code'] : 0;

		$user_id = yii::app()->user->id;
		
		$sql="select * from zy_activity where user_id='".$user_id."' and activity_code='".$activity_code."'";
		
		$rs = Yii::app()->db->createCommand($sql)->queryAll();
		
		echo $rs[0]['provide_gift_number'];
	}
	
	

	public function actionLottery(){
		
		$model=new SurveyUser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SurveyUser'])){
			$model->attributes=$_GET['SurveyUser'];
		}
		
		$model->partner_id=$_GET['user_id'];
		
		$model->activety_code=$_GET['activity_code'];
		
		$model->winning_status=0;
		
		$this->render('_formLottery',array(
				'model'=>$model,
		));
	
	}
	
	//手动抽奖
	public function actionConfirmPrizeWinning(){
		  $userId = Yii::app()->user->id;
		  $activity_code =  $_POST['code'];
		  if (Yii::app()->request->isPostRequest) {
		   $model = new SurveyUser();
           $suid =  $_POST['suid'];
            for($i = 0; $i< count($suid); $i++){
            	//查询用户资料
            	$model = SurveyUser::model()->findByPk($suid[$i]);
            	//把取出值的记录标记为已中奖
            	$rs = SurveyUser::model()->setLotteryUserStatus($model->mobile,$userId);
            	$suid = SurveyUser::model()->getSuid($model->mobile,$userId);
//             	if($currentLang == "en"){
            		$url="http://prepaidselect.com/surveysen3.php?s=".base64_encode($suid);
//             	}else {
//             		$url="http://prepaidselect.com/surveys3.php?s=".base64_encode($suid);
//             	}
            	//发送EMAIL.
            	$i = SurveyUser::model()->sendEmail($model->email,$model->first_name,$url);
            	$post_data = array(
            			'method' =>"sendMessages",
            			'username' =>"abc",
            			'password' =>"123456",
            			'mobile' =>"$model->mobile",
            			'api_id' =>53,
            			'text' =>'Congratulations! You have won a prize for the Netcube July Promotion. Please check the email you registered for further instructions on claiming your prize.'
            	);
            	/*}*/
            	$url = "http://sms.webnova.com.au/api/webnova_sms_api_lib.php";
            	$ch = curl_init();
            	curl_setopt($ch,CURLOPT_URL,$url );
            	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
            	curl_setopt($ch, CURLOPT_POST, 1);
            	// 把post的变量加上
            	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            	$output = curl_exec($ch);
            	//调试使用
            	if ($output === FALSE) {
            		$output="cURL Error: " . curl_error($ch);
            	}
            	curl_close($ch);
            	//短信发送结束----------------------------------------
            }
            
            if (isset(Yii::app()->request->isAjaxRequest)) {
            	echo 'ok,'.$activity_code;
            }
            else{
            	$this->redirect(array('surveyUser/lottery','user_id'=>$userId,'activity_code'=>$activity_code,'errorId'=>1));
            }
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		
	}
	
}
