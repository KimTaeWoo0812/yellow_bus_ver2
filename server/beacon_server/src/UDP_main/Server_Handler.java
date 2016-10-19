package UDP_main;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

import Process.b_ProcessClass;
import SubClass.SC;
import io.netty.buffer.Unpooled;
import io.netty.channel.ChannelFuture;
import io.netty.channel.ChannelHandler.Sharable;
import io.netty.channel.ChannelHandlerContext;
import io.netty.channel.SimpleChannelInboundHandler;
import io.netty.channel.socket.DatagramPacket;
import io.netty.util.CharsetUtil;

@Sharable
public class Server_Handler extends SimpleChannelInboundHandler<DatagramPacket> {
	public static Connection con = null;
	public static Statement stmt;
	 
	 public Server_Handler(){
		 connection_DB();
	 }
	 
	@Override
	public void channelActive(ChannelHandlerContext ctx) throws Exception {
		//System.out.println("클라이언트 접속..");
	}

	@Override
	public void channelRead0(ChannelHandlerContext ctx, DatagramPacket packet) {
		String request = packet.content().toString(CharsetUtil.UTF_8);
		SC.Print0("\t\tget: " + request);

		 b_ProcessClass process = new b_ProcessClass(stmt, ctx, packet, request);
		 ChannelFuture future = process.DoProcess();
	}

	@Override
	public void channelReadComplete(ChannelHandlerContext ctx) {
		ctx.flush();
	}
	@Override
	public void exceptionCaught(ChannelHandlerContext ctx, Throwable cause) {
		cause.printStackTrace();

	}
	
	public void connection_DB(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
			// Class.forName("org.gjt.mm.mysql.Driver");

			con = DriverManager.getConnection("jdbc:mysql://localhost:3306/test3", "root", "ekdrms52");
			System.out.println("DB접속 성공!");

			stmt = con.createStatement();

		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println("SQL err:" + e.toString());

		} catch (Exception e) {
			e.printStackTrace();
			System.out.println(e.toString());
		}
	}
	
}
