 <?php

$str="%3CIps%3E%3CGateWayRsp%3E%3Chead%3E%3CReferenceID%3E%3C%2FReferenceID%3E%3CRspCode%3E000000%3C%2FRspCode%3E%3CRspMsg%3E%3C%21%5BCDATA%5B%E4%BA%A4%E6%98%93%E6%88%90%E5%8A%9F%EF%BC%81%5D%5D%3E%3C%2FRspMsg%3E%3CReqDate%3E20170414105405%3C%2FReqDate%3E%3CRspDate%3E20170414105436%3C%2FRspDate%3E%3CSignature%3Edd77eb92a83fee0925f07d0cd3511928%3C%2FSignature%3E%3C%2Fhead%3E%3Cbody%3E%3CMerBillNo%3E20170414105356240143%3C%2FMerBillNo%3E%3CCurrencyType%3E156%3C%2FCurrencyType%3E%3CAmount%3E0.01%3C%2FAmount%3E%3CDate%3E20170414%3C%2FDate%3E%3CStatus%3EY%3C%2FStatus%3E%3CMsg%3E%3C%21%5BCDATA%5B%E6%94%AF%E4%BB%98%E6%88%90%E5%8A%9F%EF%BC%81%5D%5D%3E%3C%2FMsg%3E%3CAttach%3E%3C%21%5BCDATA%5B1033%5D%5D%3E%3C%2FAttach%3E%3CIpsBillNo%3EBO20170414105358057476%3C%2FIpsBillNo%3E%3CIpsTradeNo%3E2017041410540574115%3C%2FIpsTradeNo%3E%3CRetEncodeType%3E17%3C%2FRetEncodeType%3E%3CBankBillNo%3E7110184273%3C%2FBankBillNo%3E%3CResultType%3E0%3C%2FResultType%3E%3CIpsBillTime%3E20170414105435%3C%2FIpsBillTime%3E%3C%2Fbody%3E%3C%2FGateWayRsp%3E%3C%2FIps%3E";
echo urldecode($str);
$data=simplexml_load_string(urldecode($str), 'SimpleXMLElement', LIBXML_NOCDATA);
$RspCode=$data->GateWayRsp->head->RspCode;
//var_dump($data);
$MerBillNo=$data->GateWayRsp->body->MerBillNo;
echo $MerBillNo;
$Amount=$data->GateWayRsp->body->Amount;
//echo $Amount;
$Date=$data->GateWayRsp->body->Date;
//echo $Date;
$CurrencyType=$data->GateWayRsp->body->CurrencyType;
//echo $CurrencyType;
$GatewayType="01";
$Lang="GB";
$Merchanturl="http://jxj.25wy.com/RMBnew/return.php";
$FailUrl="http://jxj.25wy.com/RMBnew/error.php"; 
$Attach=$data->GateWayRsp->body->Attach;
$OrderEncodeType=5;
$RetEncodeType=17;
$RetType="1";
$ServerUrl="http://jxj.25wy.com/RMBnew/return1.php";
$BillEXP="";
$GoodsName="游戏币";
$IsCredit="";
$BankCode="";
$ProductType="";
$MerCode=194302;
$Signature=$data->GateWayRsp->head->Signature;

$key="olKjjdbsuoOzvcAJCQW9pemZogEOXcuTEowrOzLNywfkld9pcduxv8waS6QS9bFQOLZ8NPZGgSyoswDpBneLlv6axP44nNGc4N4sYqgNU8NW80svjFWGNfOQfEEJxGlQ";

$Signature1="<body><MerBillNo>".$MerBillNo."</MerBillNo><Amount>".$Amount."</Amount><Date>".$Date."</Date><CurrencyType>". $CurrencyType."</CurrencyType ><GatewayType>".$GatewayType."</GatewayType><Lang>".$Lang."</Lang><Merchanturl>".$Merchanturl."</Merchanturl><FailUrl>".$FailUrl."</FailUrl><Attach>".$Attach."</Attach><OrderEncodeType>".$OrderEncodeType."</OrderEncodeType><RetEncodeType>".$RetEncodeType."</RetEncodeType><RetType>".$RetType."</RetType><ServerUrl>". $ServerUrl."</ServerUrl><BillEXP>".$BillEXP."</BillEXP><GoodsName>".$GoodsName."</GoodsName><IsCredit>".$IsCredit."</IsCredit><BankCode>".$BankCode."</BankCode><ProductType>".$ProductType."</ProductType></body>".$MerCode.$key;//数字签名 必输  256
$newSignature=md5($Signature1);
var_dump($newSignature);
echo "<br>";
//var_dump($Signature);exit;

if($Signature==$newSignature ){
	echo "1 dd77eb92a83fee0925f07d0cd3511928";
}
$MerBillNo="no"+date('YmdHis').mt_rand(100000,999999);
$MerBillNo2="no"+date('YmdHis').mt_rand(100000,999999);
echo $MerBillNo.'</br>'.$MerBillNo;
?>
