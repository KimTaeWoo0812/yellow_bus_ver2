<?php if(!defined("__XE__"))exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko"  xml:lang="ko">
	<head>
		<meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />
	</head>
	
4  
	<body>
		<table width="100%", border=1>
			<tr align=center>
  
<th>학원</th><th>차이름</th><th>운행상태</th><tr><th>관리그룹</th><th>123</th><th>1</th><th width=20%><form  method=post><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type = hidden name = delGroupNAME value = 관리그룹><input type = hidden name = delCarNAME value = 123> <input type='submit' name=관리그룹_123 value='차량 삭제'></form></th></tr>
<tr><th>관리그룹</th><th>142</th><th>0</th><th width=20%><form  method=post><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type = hidden name = delGroupNAME value = 관리그룹><input type = hidden name = delCarNAME value = 142> <input type='submit' name=관리그룹_142 value='차량 삭제'></form></th></tr>
<tr><th>관리그룹</th><th>3123</th><th>0</th><th width=20%><form  method=post><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type = hidden name = delGroupNAME value = 관리그룹><input type = hidden name = delCarNAME value = 3123> <input type='submit' name=관리그룹_3123 value='차량 삭제'></form></th></tr>
		</table>
		
		<form  method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<table width="100%" border="1">
				<tr>
				차량 추가하기
				</tr>
				<tr>
					<th>차량 이름</th>
					<input type = "hidden" name = "txtGroupNAME" value = "관리그룹">
					<td><input type="text" name="txtCarNAME" ></td>
					<input type = "hidden" name = "txtCarDRIVING" value = "0">
					<td><input type="submit" name="submit" value="등록"></td>
				</tr>
			</table>		  
		</form>
		
						
		
	</body>
</html>