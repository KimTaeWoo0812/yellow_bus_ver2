package Process;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import SubClass.SC;
import io.netty.buffer.Unpooled;
import io.netty.channel.ChannelFuture;
import io.netty.channel.ChannelHandlerContext;
import io.netty.channel.socket.DatagramPacket;
import io.netty.util.CharsetUtil;

public class b_ProcessClass {
	private Statement stmt;
	private ChannelHandlerContext ctx;
	private DatagramPacket packet;
	private String strMsg;

	public b_ProcessClass(Statement stmt, ChannelHandlerContext ctx, DatagramPacket packet, String strMsg) {
		this.stmt = stmt;
		this.ctx = ctx;
		this.packet = packet;
		this.strMsg = strMsg;
	}

	private boolean CheckBeaconType(String msg, String type) {
		if (msg.equals(type))
			return true;
		else
			return false;
	}

	public ChannelFuture DoProcess() {
		String msg[] = strMsg.split(SC._del);

		System.out.println(msg[0] + "  " + msg[1] + "  " + msg[2] + "  ");

		if (!msg[0].equals("PUSH"))
			return null;

		// msg[1] = flag(등/하원), msg[2] = beaconID, msg[3] = 종일반 / 반일반 상태
		String gcm_reg_id = "";
		String member_mail_address = "";
		String member_name = "";
		String group_name = "";
		String first_beacon[] = new String[2];
		String second_beacon[] = new String[2];
		String third_beacon[] = new String[2];
		ResultSet result;
		int case_ = 5;

		boolean checkDo = false;
		try {
			result = stmt.executeQuery("select gcm_reg_id,member_mail_address,member_name,group_name, "
					+ "first_beacon_serial,second_beacon_serial,third_beacon_serial,"
					+ "first_beacon_type,second_beacon_type,third_beacon_type " 
					+ "from xe_beacon "
					+ "where first_beacon_serial='" + msg[2] + "' " + "OR second_beacon_serial='" + msg[2] + "' "
					+ "OR third_beacon_serial='" + msg[2] + "';");
			while (result.next()) {
				gcm_reg_id = result.getString(1);
				member_mail_address = result.getString(2);
				member_name = result.getString(3);
				group_name = result.getString(4);

				first_beacon[0] = result.getString(5);
				second_beacon[0] = result.getString(6);
				third_beacon[0] = result.getString(7);

				first_beacon[1] = result.getString(8);
				second_beacon[1] = result.getString(9);
				third_beacon[1] = result.getString(10);
				checkDo = true;
			}

			if(!checkDo){
				errMsg(ctx, packet);
				return null;
			}
			if (!msg[1].equals("0")) {
				System.out.println(msg[2]);
				System.out.println(first_beacon[0]);
				System.out.println(second_beacon[0]);
				System.out.println(third_beacon[0]);
				System.out.println(third_beacon[1]);
				
				boolean check = false; // 반일반 종일반 체크
				if (first_beacon[0].equals(msg[2])) {
					check = CheckBeaconType(msg[1], first_beacon[1]);
				}

				else if (second_beacon[0].equals(msg[2])) {
					check = CheckBeaconType(msg[1], second_beacon[1]);
				}

				else if (third_beacon[0].equals(msg[2])) {
					check = CheckBeaconType(msg[1], third_beacon[1]);
				}

				
				
				// check 가 true 면 저장하고 패킷 날리면 댐
				//조회는 다 됬는데, 타입이 다르다. 즉, 지금 시간에 퇴근이 아니다
				if (!check) {
					ctx.write(new DatagramPacket(Unpooled
							.copiedBuffer("PUSH" + SC._del + "1" + SC._del + "0" + SC._del + "\n", CharsetUtil.UTF_8),
							packet.sender()));
					System.out.println("보내는 메시지: "+ "PUSH" + SC._del + "1" + SC._del + "0" + SC._del);

					return null;
				}
			}
			
			String text = "";
			{
				if (msg[0].equals("0"))
					text = member_name + "님이 " + group_name + "에 ";
				else
					text = member_name + "님이 " + group_name + "에 ";
			}
			// 출석 정보 삽입
			stmt.executeUpdate("insert into xe_stud_log(`id`, `school`, `text`, `flag`) values('" + member_mail_address
					+ "','" + group_name + "','" + text + "','" + msg[1] + "');");

			// reg_id+SC._del+text+"\n"
			// 전송
			ctx.write(new DatagramPacket(Unpooled
					.copiedBuffer("PUSH" + SC._del + gcm_reg_id + SC._del + text + SC._del + "\n", CharsetUtil.UTF_8),
					packet.sender()));

			SC.Print0("보내는 메시지: " + gcm_reg_id + SC._del + text);

			result.close();

		} catch (SQLException e) {
			System.out.println(e);
			errMsg(ctx, packet);
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		return null;
	}

	void errMsg(ChannelHandlerContext ctx, DatagramPacket packet) {
		ctx.write(new DatagramPacket(
				Unpooled.copiedBuffer("PUSH" + SC._del + "0" + SC._del + "0" + SC._del + "\n", CharsetUtil.UTF_8),
				packet.sender()));
	}

}






// public synchronized ChannelFuture DoProcess(ChannelHandlerContext ctx,
// DatagramPacket packet, String strMsg){
// String msg[] = strMsg.split(SC._del);
//
// System.out.println(msg[0]+" "+msg[1]+" "+msg[2]+" ");
//
// if(!msg[0].equals("PUSH"))
// return null;
//
// //msg[1] = flag, msg[2] = beaconID
// String member_srl = "";
// String email_address = "";
// String nick_name = "";
// String group_srl = "";
// String title = "";
// String reg_id="";
//
// boolean check = true;
//
// ResultSet result;
//
// try {
// result = stmt
// .executeQuery("select member_srl,email_address, nick_name from xe_member
// where find_account_answer = '"+msg[2]+"' OR homepage = '"+msg[2]+"' OR
// blog = '"+msg[2]+"';");
// //select member_srl,email_address, nick_name from xe_member where
// find_account_answer = '창원' OR homepage = '창원' OR blog = '창원';
// while (result.next()){
// member_srl = result.getString(1);
// email_address = result.getString(2);
// nick_name = result.getString(3);
// check = false;
// }
// if(check){
// errMsg(ctx,packet);
// SC.Print0("없다! 1");
// return null;
// }
// check=true;
// result = stmt
// .executeQuery("select group_srl from xe_member_group_member where
// member_srl='"+member_srl+"';");
// while (result.next()){
// group_srl = result.getString(1);
// check=false;
// }
// if(check){
// errMsg(ctx,packet);
// SC.Print0("없다! 2 ");
// return null;
// }
// check=true;
// result = stmt
// .executeQuery("select title from xe_member_group where
// group_srl='"+group_srl+"';");
// while (result.next()){
// title = result.getString(1);
// check=false;
// }
// if(check){
// errMsg(ctx,packet);
// SC.Print0("없다! 3");
// return null;
// }
// check=true;
// result = stmt
// .executeQuery("select reg_id from xe_androidpusgapp_gcmregid where
// member_srl = '"+member_srl+"';");
// while (result.next()){
// reg_id = result.getString(1);
// check=false;
// }
// if(check){
// errMsg(ctx,packet);
// SC.Print0("없다! 4");
// return null;
// }
// check=true;
// String text="";
//
// if(msg[1].equals("0"))
// text=nick_name+"님이 "+title+"에 등원 했습니다.";
// else
// text=nick_name+"님이 "+title+"에 하원 했습니다.";
//
//
// SC.Print0("조회 결과:
// "+email_address+SC._del+title+SC._del+text+SC._del+msg[1]);
// //출석 정보 삽입
// stmt.executeUpdate("insert into xe_stud_log(`id`, `school`, `text`,
// `flag`)
// values('"+email_address+"','"+title+"','"+text+"','"+msg[1]+"');");
// //insert into xe_stud_log(`id`, `school`, `text`, `flag`)
// values('windowsmail@nate.com', '관리그룹','testestsetsetset','1');
//
//
// //reg_id+SC._del+text+"\n"
// //전송
// ctx.write(new DatagramPacket(
// Unpooled.copiedBuffer("PUSH"+SC._del+reg_id+SC._del+text+SC._del+"\n",
// CharsetUtil.UTF_8),packet.sender()));
//
// SC.Print0("보내는 메시지: "+reg_id+SC._del+text);
//
// result.close();
//
// } catch (SQLException e) {
// System.out.println(e);
// errMsg(ctx,packet);
// // TODO Auto-generated catch block
// e.printStackTrace();
// }
//
// return null;
// }