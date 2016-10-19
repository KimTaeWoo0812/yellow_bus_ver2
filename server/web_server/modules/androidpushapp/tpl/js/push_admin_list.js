jQuery(function ($){
	
	$('a.modalAnchor._member').bind('before-open.mw', function(){
		var $RegList = $('._memberList input[name=user]:checked');
		if ($RegList.length == 0){
			alert(xe.lang.msg_select_user);
			return false;
		}
		var memberInfo, regids, preg;
		var memberTag = "";	
		$('#message').val('');
		$('#title').val('');
		$('#link').val('');
		for (var i = 0; i<$RegList.length; i++){
			memberInfo = '';
			memberInfo = $RegList.eq(i).val().split('\t');
			regids = memberInfo[0];
			preg=regids.substring(0, 20);
			if(memberInfo[1] == 'W'){
				if(memberInfo[2]){
					memberTag += '<tr><td>'+memberInfo[2]+'</td><td>'+memberInfo[3]+'</td><td>'+preg+'<input type="hidden" name="reg_idsw[]" value="'+regids+'"/></td></tr>';
				}else{
					memberTag += '<tr><td>익명</td><td></td><td>'+preg+'<input type="hidden" name="reg_idsw[]" value="'+regids+'"/></td></tr>';
				}
			}
			if(memberInfo[1] == 'B'){
				if(memberInfo[2]){
					memberTag += '<tr><td>'+memberInfo[2]+'</td><td>'+memberInfo[3]+'</td><td>'+preg+'<input type="hidden" name="reg_idsb[]" value="'+regids+'"/></td></tr>';
				}else{
					memberTag += '<tr><td>익명</td><td></td><td>'+preg+'<input type="hidden" name="reg_idsb[]" value="'+regids+'"/></td></tr>';
				}
			}			
		}
		$('#popupBody').empty().html(memberTag);
	});
});
