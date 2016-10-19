package SubClass;

public class SC {
	public static String _del="";//데이터 구분자
	public static String _endDel="";//어레이리스트 종료 구분자
	public static String _endSendDel="";//데이터 끝 구분자
	public static boolean isPrint = true;
	
	public static void SetData(){
		_del+="#";
		_endDel+=(char)201;
		_endSendDel+=(char)202;
	}
	public static void Print0(Object str){
		if(isPrint)
			System.out.println(str);
	}
	
}
