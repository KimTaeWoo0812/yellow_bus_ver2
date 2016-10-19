package Process;

import Security.AES;
import SubClass.SC;
import io.netty.channel.ChannelFuture;
import io.netty.channel.ChannelHandlerContext;

public class a1_ProcessClass {

	a2_FunctionGather gather = new a2_FunctionGather();
	
	
	public synchronized ChannelFuture DoProcess(ChannelHandlerContext ctx, String strMsg){
		String msg[] = strMsg.split(SC._del);
		//SC.Print0("\t\tget2: "+msg[0]);
		
		
		
		switch (msg[0]) {
		case "test":
			System.out.println("test");
			//gather.sendToAll(msg[1]);
			break;
		case "RODING":
			gather.RODING(ctx);
			break;
	
		case "LOGIN":
			gather.LOGIN(ctx, msg);
			break;
//		case "LOGOUT":
//			gather.LOGOUT(ctx);
//			break;
		case "S_LIST":
			gather.S_LIST(ctx, msg);
			break;
		case "S_INFO":
			gather.S_INFO(ctx, msg);
			break;
		case "S_CAR":
			gather.S_CAR(ctx, msg);
			break;
		case "S_CAR_FOR_DRIVER":
			gather.S_CAR_FOR_DRIVER(ctx, msg);
			break;
		case "S_CAR_START":
			gather.S_CAR_START(ctx, msg);
			break;
		case "S_CAR_DONE":
			gather.S_CAR_DONE(ctx, msg);
			break;
		case "LOG":
//			ctx.write("LOG"+SC._del+"김태우 짱"+SC._del+"2016-06-20 11"+SC._endDel+SC._endSendDel);
//			ctx.write("LOG"+SC._del+"김태우 짱"+SC._del+"2016-06-21 11"+SC._endDel+SC._endSendDel);
//			ctx.write("LOG"+SC._del+"김태우 짱"+SC._del+"2016-06-22 11"+SC._endDel+SC._endSendDel);
//			ctx.write("LOG"+SC._del+"김태우 짱"+SC._del+"2016-06-23 11"+SC._endDel+SC._endSendDel);
//			ctx.write("LOG"+SC._del+"김태우 짱"+SC._del+"2016-07-10 11"+SC._endDel+SC._endSendDel);
//			ctx.write("LOG"+SC._del+"김태우 짱2"+SC._del+"2016-07-10 11"+SC._endDel+SC._endSendDel);
//			ctx.write("LOG"+SC._del+"김태우 짱3"+SC._del+"2016-07-11 12"+SC._endDel+"0"+SC._del+SC._endSendDel);
//			ctx.flush();
			gather.LOG(ctx, msg); // id, school 받아서 text, date 넘겨준다
			break;
			
			
			
			
			
			
			
			
		case "S_BEACON":
			gather.S_BEACON(ctx, msg);
			break;
			
			
			
		case "S_NOTICE_LIST": //공지 기능
			gather.S_NOTICE_LIST(ctx, msg);
			break;
		case "S_NOTICE_CREATE":
			gather.S_NOTICE_CREATE(ctx, msg);
			break;
		case "S_NOTICE_DEL":
			gather.S_NOTICE_DEL(ctx, msg);
			break;
		case "S_N_COMMENT_LIST": //공지 댓글 기능
			gather.S_N_COMMENT_LIST(ctx, msg);
			break;
		case "S_N_COMMENT_CREATE":
			gather.S_N_COMMENT_CREATE(ctx, msg);
			break;
		case "S_N_COMMENT_DEL":
			gather.S_N_COMMENT_DEL(ctx, msg);
			break;
			
			
//		case "LOG":
//			gather.LOG(ctx, msg);
//			break;
		case "L_LIST_TO_S":
			gather.L_LIST_TO_S(ctx, msg);
			break;
		case "L_LIST_TO_P":
			gather.L_LIST_TO_P(ctx, msg);
			break;
		case "M_NOTICE":
			gather.M_NOTICE(ctx, msg);
			break;
		case "M_VIEW_MEMBER":
			gather.M_VIEW_MEMBER(ctx, msg);
			break;
		case "GET_SCHOOL_NAME":
			gather.GET_SCHOOL_NAME(ctx, msg);
			break;
		case "GET_SCHOOL_NAME_AND_SAVE":
			gather.GET_SCHOOL_NAME_AND_SAVE(ctx, msg);
			break;
		default:
			SC.Print0("잘못된 명령어!");
			break;
		}
		return null;
		
		
		
	}
}
