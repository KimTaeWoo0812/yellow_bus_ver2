package Process;

import java.sql.Connection;
import java.sql.Date;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.SimpleDateFormat;
import java.util.ArrayList;

import SubClass.LogManager;
import SubClass.SC;
import SubClass.ServerManage;


public class DB {
	static Connection con = null;
	static Statement stmt;
	
	static ServerManage Manage;
	
	public static String _del="";//데이터 구분자
	public static String _endDel="";//어레이리스트 종료 구분자
	public static String _endSendDel="";//데이터 끝 구분자
	
	public static DB _shared = null;//싱글톤
	static final int nCheckCount_FOR_NOTICE = 20;
	static final int nCheckCount_FOR_LOG = 50;
	public static DB shared() {
		if (_shared == null) {
			_shared = new DB();
		}
		return _shared;
	}
	
	public DB() {
		try {
			Thread.sleep(500);
		} catch (InterruptedException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		Manage = new ServerManage(this);
		Thread t = new Thread(Manage);
		t.start();
		
		_del+=(char)200;
		_endDel+=(char)201;
		_endSendDel+=(char)202;
		try {
			Class.forName("com.mysql.jdbc.Driver");
			// Class.forName("org.gjt.mm.mysql.Driver");

			con = DriverManager.getConnection(
					"jdbc:mysql://localhost:3306/test3", "root", "ekdrms52");
			System.out.println("DB접속 성공!");

			stmt = con.createStatement();
			
			// con.close();//DB 占쏙옙占쏙옙
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println("SQL err:" + e.toString());

		} catch (Exception e) {
			e.printStackTrace();
			System.out.println(e.toString());
		}
		

		LogManager.SetLog();
	}
	public static ArrayList<String> CheckTables(){
		ArrayList<String> val = new ArrayList<String>();
		try {
			ResultSet result = stmt.executeQuery("show tables;");
			while (result.next())
				val.add(result.getString(1));

			result.close();
		}catch(SQLException e){
			e.printStackTrace();
		}
		return val;
	}
	
	public static int Make_Log_Table(String newName){
		
		try {
			stmt.executeUpdate("CREATE TABLE "+newName+" ("
					+ "schoolNum  varchar(10) NOT NULL, " 
					+ "studentId  varchar(40) NOT NULL, " 
					+ "studentName  varchar(40) NOT NULL, " 
					+ "content  varchar(90) NOT NULL, " //내용
					+ "time  varchar(40) NOT NULL, " //data는 19글자로 나온다
					+ "state  varchar(10) NOT NULL " 
					+");");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			
			return 0;
			
		}
		
		return 1;
		
	}
	
	//활동 로그
//	stmt.executeUpdate("CREATE TABLE move_log ("
//			+ "studentId  varchar(40) NOT NULL, " 
//			+ "studentName  varchar(40) NOT NULL, " 
//			+ "content  varchar(60) NOT NULL, " //내용
//			+ "time  varchar(40) NOT NULL " //data는 19글자로 나온다
//			+");");
	

	//공지 기능
	public synchronized ArrayList<StringBuilder> S_NOTICE_LIST(String schoolNum, String count) {//!@
		ArrayList<StringBuilder> val = Process_List("select noticeNum,text,date,name from notice where schoolNum = '"+schoolNum+"' LIMIT "+count+","+nCheckCount_FOR_NOTICE+";", 4);
		return val;
	}
	public synchronized void S_NOTICE_CREATE(String schoolNum, String text, String date, String name) {
		try {
			String message = "insert into notice(`noticeNum`, `schoolNum`, `text`, `date`, `name`) "
					+ "values(NULL,'"+schoolNum+"','"+text+"','"+date+"','"+name+"');";
			stmt.executeUpdate(message);
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	public synchronized void S_NOTICE_DEL(String noticeNum) {
		try {
			String message = "delete from notice where noticeNum = '"+noticeNum+"';";
			stmt.executeUpdate(message);
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	//공지 댓글 기능
	public synchronized ArrayList<StringBuilder> S_N_COMMENT_LIST(String noticeNum, String count) {
		ArrayList<StringBuilder> val = Process_List("select commentNum,noticeNum,text,date,name from comment_from_notice where noticeNum = '"+noticeNum+"' LIMIT "+count+","+nCheckCount_FOR_NOTICE+";", 5);
		return val;
	}
	public synchronized void S_N_COMMENT_CREATE(String noticeNum, String schoolNum, String text, String date, String name) {
		try {
			String message = "insert into comment_from_notice(`commentNum`, `noticeNum`, `schoolNum`, `text`, `date`, `name`) "
					+ "values(NULL,'"+noticeNum+"','"+schoolNum+"','"+text+"','"+date+"','"+name+"');";
			stmt.executeUpdate(message);
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	public synchronized void S_N_COMMENT_DEL(String commentNum) {
		try {
			String message = "delete from comment_from_notice where commentNum = '"+commentNum+"';";
			stmt.executeUpdate(message);
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	
	
	
	
	static String getDate() {
		long time = System.currentTimeMillis(); 
        SimpleDateFormat f = new SimpleDateFormat("yyyy/MM/dd/hh/mm/ss");
        return f.format(new Date(time));
	}
	
	public synchronized ArrayList<StringBuilder> Process_List(String query, int size){
		ArrayList<StringBuilder> val = new ArrayList<StringBuilder>();
		StringBuilder temp = new StringBuilder();
		ResultSet result;
		int j=0, i=0;
		try {
			
			result = stmt.executeQuery(query);
			while (result.next()){
				for(i=1;i<size;i++){
					temp.append(result.getString(i)+_del);
				}
				temp.append(result.getString(i)+_del+_endDel);

				j++;
				if(j>60){
					temp.append(SC._endSendDel);
					//SC.Print0(temp.toString());
					val.add(temp);
					temp.setLength(0);
					j=0;
				}
			}
			temp.append("0"+_del+"0"+_del+_endDel);
			val.add(temp);
			result.close();
			return val;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}
	
	/**
	 * return 1 = 성공, 2 = 없는 id, 3 = 이미 로그인됨, 3 = 틀린 비밀번호, 0 = 실패
	 * @param id
	 * @return
	 */
	public synchronized String LOGIN(String id, String pw) {
		ResultSet result;
		boolean check = false;
		String val = "";
		try {
			
			result = stmt
					.executeQuery("select role, group_name, school_location from xe_beacon "
							+ "where email_address='"+id+"' AND member_secret='"+pw+"';");
			
			while (result.next()){
				check = true;
				val += result.getString(1)+_del;
				val += result.getString(2)+_del;
				val += result.getString(3);
			}
			
//			result = stmt
//					.executeQuery("select xe_member.nick_name, xe_member.find_account_question, "
//							+ "xe_member_group_member.group_srl from xe_member inner join xe_member_group_member "
//							+ "where email_address='"+id+"' AND password='"+pw+"' AND xe_member.member_srl = xe_member_group_member.member_srl;");
//			
//			String group_srl = "";
//			
//			while (result.next()){
//				check = true;
//				val += result.getString(1)+_del;
//				val += result.getString(2)+_del;
//				group_srl = result.getString(3);
//			}
//			
//			
//			if(check){
//				result = stmt
//						.executeQuery("select title, description from xe_member_group where group_srl = '"+group_srl+"';");
//				
//				while (result.next()){
//					val += result.getString(1)+_del;
//					val += result.getString(2);
//				}
//				
//			}
			
			result.close();
			if(!check) return "0";
			
			return val;
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return "0";
		}
	}
	
	public synchronized ArrayList<StringBuilder> S_LIST(String id) {
		ArrayList<StringBuilder> val = Process_List("SELECT group_srl,role from xe_member_group_member where member_srl like '"+id+"';", 2);
		return val;
	}

	
	public synchronized String S_INFO(String schoolName) {
		ResultSet result;
		String strTemp="";
		int i=0;
		try {
			
			result = stmt.executeQuery("SELECT title, description FROM xe_member_group WHERE title='"+schoolName+"';");
			while (result.next()){
				strTemp += result.getString(1)+_del;
				strTemp += result.getString(2)+_del;

				break;
			}
			result.close();
			return strTemp;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		return "0";
	}
	
	
	
	public synchronized void LoginOut(String id) {
		try {
			stmt.executeUpdate("update user set islogin='0' where id like '"
					+ id + "';");// 占쏙옙占쏙옙
			SC.Print0(id + " 로그아웃 from DB");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	public synchronized StringBuilder GetName(String id){
		ResultSet result;
		StringBuilder strTemp = null;
		try {
			result = stmt.executeQuery("select name from user where id like '"+ id + "' ;");
			
			while (result.next())
				strTemp = new StringBuilder(result.getString(1));
			
			result.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return strTemp;
	}
	
	public synchronized ArrayList<StringBuilder> S_CAR(String schoolName) {
		ArrayList<StringBuilder> val = Process_List("SELECT carName from car where school like '"+schoolName+"' AND driving='1';", 1);
		return val;
	}
	public synchronized ArrayList<StringBuilder> S_CAR_FOR_DRIVER(String schoolName) {
		ArrayList<StringBuilder> val = Process_List("SELECT carName, driving from car where school like '"+schoolName+"';", 2);
		return val;
	}
	
	public synchronized String S_CAR_START(String schoolName, String carName) {
		String val = "0";
		String m = "update car set driving='1' where carName='" + carName+ "' AND school='"+schoolName+"';";
		try {
			stmt.executeUpdate(m);
			val = "1";
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return val;
	}
	public synchronized String S_CAR_DONE(String schoolName, String carName) {
		String val = "0";
		String m = "update car set driving='0' where carName='" + carName+ "' AND school='"+schoolName+"';";
		try {
			stmt.executeUpdate(m);
			val = "1";
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return val;
	}
	
	
	
	public synchronized ArrayList<StringBuilder> S_BEACON(String schoolName) {
		ArrayList<StringBuilder> val = Process_List("SELECT identifier,isCar from beacon where schoolName like '"+schoolName+"';", 2);
		return val;
	}
	
	public synchronized ArrayList<StringBuilder> LOG(String id, String school, String standardDate) {
		ArrayList<StringBuilder> val = Process_List("SELECT text,date from xe_stud_log where id = '"+id+"' AND school = '"+school+"' AND date >= str_to_date('"+standardDate+"','%Y-%m-%d');", 2);
		return val;
	}
	
	
	
	public synchronized String GET_SCHOOL_NAME(String id, String name, String content, String time, String state, String beaconName) {
		ResultSet result;
		String strTemp = "0";
		try {
			//비콘 번호로 학원명 조회 후 로그 저장
			result = stmt.executeQuery("SELECT schoolName from beacon where identifier = '"+beaconName+"';");
			while (result.next()){
				strTemp = result.getString(1);
			}
			result = stmt.executeQuery("SELECT delayTime from school where name = '"+strTemp+"';");
			while (result.next()){
				strTemp +=  _del+result.getString(1);
			}
			
			return strTemp;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return strTemp;
	}
	public synchronized String GET_SCHOOL_NAME_AND_SAVE(String id, String name, String content, String time, String state, String beaconName) {
		ResultSet result;
		String strTemp = "1";
		try {
			//비콘 번호로 학원명 조회 후 로그 저장
			result = stmt.executeQuery("SELECT schoolName from beacon where identifier = '"+beaconName+"';");
			while (result.next()){
				strTemp = result.getString(1);
			}
			
			String message = "insert into "+LogManager.GetRearLogTableName()+"(`schoolNum`, `studentId`, `studentName`, `content`, `time`,`state`) "
					+ "values('"+strTemp+"','"+id+"','"+name+"','"+strTemp+content+"','"+time+"''"+state+"',);";
			stmt.executeUpdate(message);
			
			return strTemp;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return strTemp;
	}
	// 학생한테 로그 리스트를 준다
	public synchronized ArrayList<StringBuilder> L_LIST_TO_S(String studentId, String schoolNum) {
		//System.out.println("asdasdasd: "+LogManager.GetRearLogTableName());
		ArrayList<StringBuilder> val = Process_List("SELECT content,time,state from " + LogManager.GetRearLogTableName()
				+ " where studentId like '" + studentId + "' AND schoolNum = '"+schoolNum+"';", 3);
		return val;
	}

	// 학생한테 로그 리스트를 준다2
	public synchronized ArrayList<StringBuilder> L_LIST_TO_S2(String studentId, String schoolNum) {
		ArrayList<StringBuilder> val = Process_List("SELECT content,time,state from " + LogManager.GetR_RearLogTableName()
				+ " where studentId like '" + studentId + "' AND schoolNum = '"+schoolNum+"';", 3);
		return val;
	}

	// 부모한테 학생의 로그 리스트를 준다
	public synchronized ArrayList<StringBuilder> L_LIST_TO_P(String parent, String schoolNum) {
		ArrayList<StringBuilder> query = new ArrayList<StringBuilder>();
		StringBuilder temp = new StringBuilder();
		ResultSet result;
		String strTemp = "";
		parent = "SELECT userId from mySchool where parent1 like '"+parent+"' OR parent2 like '"+parent+"';";
		
		int j=0;
		try {
			
			result = stmt.executeQuery(parent);
			while (result.next())
				parent = result.getString(1);
				
			result.close();
			//System.out.println(parent);
			ArrayList<StringBuilder> val = Process_List("SELECT content,time,state from "+LogManager.GetRearLogTableName()
														+" where studentId like '"+parent+"' AND schoolNum = '"+schoolNum+"';", 3);
			return val;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}

	// 부모한테 학생의 로그 리스트를 준다2
	public synchronized ArrayList<StringBuilder> L_LIST_TO_P2(String parent, String schoolNum) {
		ArrayList<StringBuilder> query = new ArrayList<StringBuilder>();
		StringBuilder temp = new StringBuilder();
		ResultSet result;
		String strTemp = "";
		parent = "SELECT userId from mySchool where parent1 like '"+parent+"' OR parent2 like '"+parent+"';";
		int j = 0;
		try {

			result = stmt.executeQuery(parent);
			while (result.next())
				parent = result.getString(1);

			//System.out.println(parent);
			ArrayList<StringBuilder> val = Process_List("SELECT content,time,state from " + LogManager.GetR_RearLogTableName()
														+ " where studentId like '" + parent + "' AND schoolNum = '"+schoolNum+"';", 3);
			result.close();
			return val;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}

	/**
	 * 1: 성공, 2: 실패
	 * 
	 * @param schoolName
	 * @param text
	 * @return
	 */
	public synchronized int M_NOTICE(String schoolName, String text) {
		int val = 0;
		String m = "update school set isNotice='1', notice='"+text+"' where name like '" + schoolName+ "';";
		try {
			stmt.executeUpdate(m);
			val = 1;
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return val;
	}
	
	public synchronized ArrayList<StringBuilder> M_VIEW_MEMBER(String schoolName) {
		ArrayList<StringBuilder> val = Process_List("SELECT userId,userName,role from mySchool where schoolName like '"+schoolName+"';", 3);
		return val;
	}
}
