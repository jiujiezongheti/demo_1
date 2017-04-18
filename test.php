<?php
	$string = 'adgsdD%3CIps%3E%3CGateWayRsp%3E%3Chead%3E%3CReferenceID%3E%3C%2FReferenceID%3E%3CRspCode%3E000000%3C%2FRspCode%3E%3CRspMsg%3E%3C%21%5BCDATA%5B%E4%BA%A4%E6%98%93%E6%88%90%E5%8A%9F%EF%BC%81%5D%5D%3E%3C%2FRspMsg%3E%3CReqDate%3E20170413180723%3C%2FReqDate%3E%3CRspDate%3E20170413180926%3C%2FRspDate%3E%3CSignature%3Ebb00d4274fca1341aa3edf9da129badf%3C%2FSignature%3E%3C%2Fhead%3E%3Cbody%3E%3CMerBillNo%3E20170413180616185552%3C%2FMerBillNo%3E%3CCurrencyType%3E156%3C%2FCurrencyType%3E%3CAmount%3E0.01%3C%2FAmount%3E%3CDate%3E20170413%3C%2FDate%3E%3CStatus%3EY%3C%2FStatus%3E%3CMsg%3E%3C%21%5BCDATA%5B%E6%94%AF%E4%BB%98%E6%88%90%E5%8A%9F%EF%BC%81%5D%5D%3E%3C%2FMsg%3E%3CAttach%3E%3C%21%5BCDATA%5B1033%5D%5D%3E%3C%2FAttach%3E%3CIpsBillNo%3EBO20170413180616060065%3C%2FIpsBillNo%3E%3CIpsTradeNo%3E201704131807233423%3C%2FIpsTradeNo%3E%3CRetEncodeType%3E17%3C%2FRetEncodeType%3E%3CBankBillNo%3E7110180749%3C%2FBankBillNo%3E%3CResultType%3E0%3C%2FResultType%3E%3CIpsBillTime%3E20170413180924%3C%2FIpsBillTime%3E%3C%2Fbody%3E%3C%2FGateWayRsp%3E%3C%2FIps%3E';
	/**
	 * 获取标签内容
	 * @param  string $_tagname 标签名，不区分大小写
	 * @param  string $string   未解析url字符串
	 * @return string           标签内容
	 */
	function get_data($_tagname,$string){
		$string=strtolower(urldecode($string));
		$_tagname = strtolower($_tagname);
		$reg = "#<".$_tagname."[^>]*>(.*?)<\/".$_tagname.">#";
		preg_match_all($reg , $string , $matches);
		return $matches[1][0];
	}
	
	echo get_data('resulttype',$string);
?>