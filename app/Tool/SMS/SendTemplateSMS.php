<?php

namespace App\Tool\SMS;

use App\Entity\M3Result;

class SendTemplateSMS
{
  //主帐号
  private $accountSid='8a216da86a58af8b016a8696afc6160f';

  //主帐号Token
  private $accountToken='73a7aff4fd4548f1828354fe18355426';

  //应用Id
  private $appId='8a216da86a58af8b016a8696b0141615';

  //请求地址，格式如下，不需要写https://
  private $serverIP='app.cloopen.com';

  //请求端口
  private $serverPort='8883';

  //REST版本号
  private $softVersion='2013-12-26';

  /**
    * 发送模板短信
    * @param to 手机号码集合,用英文逗号分开
    * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
    * @param $tempId 模板Id
    */
  public function sendTemplateSMS($to,$datas,$tempId)
  {
      $m3_result = new M3Result;

      // 初始化REST SDK
      $rest = new CCPRestSDK($this->serverIP,$this->serverPort,$this->softVersion);
      $rest->setAccount($this->accountSid,$this->accountToken);
      $rest->setAppId($this->appId);

      // 发送模板短信
      //  echo "Sending TemplateSMS to $to <br/>";
      $result = $rest->sendTemplateSMS($to,$datas,$tempId);
      if($result == NULL ) {
          $m3_result->status = 3;
          $m3_result->message = 'result error!';
      }
      if($result->statusCode != 0) {
          $m3_result->status = $result->statusCode;
          $m3_result->message = $result->statusMsg;
      }else{
          $m3_result->status = 0;
          $m3_result->message = '发送成功';
      }
      return $m3_result;
  }
}
// 第一个参数就是电话号码，第二个数组参数就是内容和时效的时间
//sendTemplateSMS("18576437523", array(1234, 5), 1);
