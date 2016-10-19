package net.computeering.newschoolbus.TCP;
import android.util.Log;

import java.io.IOException;
import java.net.InetSocketAddress;
import java.nio.ByteBuffer;
import java.nio.CharBuffer;
import java.nio.channels.NotYetConnectedException;
import java.nio.channels.SelectionKey;
import java.nio.channels.Selector;
import java.nio.channels.SocketChannel;
import java.nio.charset.Charset;
import java.util.Iterator;

public class TCP_Socket extends Thread {


    public SocketChannel client;
    boolean  stopThread = false;

    volatile boolean isConnectedSocket = false;
    volatile boolean isSendFinshed = false;


    private String strTemp;
    public static TCP_Socket socket;

    public static synchronized TCP_Socket shared() {

        socket = new TCP_Socket();
        socket.start();

        return socket;
    }
    public void CloseSocket(){
        try {
            stopThread = true;

            while (!isSendFinshed){
                try {
                    Thread.sleep(0);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
//			while (!isConnectedSocket)
//				;
            try {
                client.socket().close();
                client.close();
            } catch (IOException e) {
                e.printStackTrace();
            }

        } catch (NotYetConnectedException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    public String GetMsg(){
        while (!HasMsg()){
            if(ServerCheck.canNotGet) {
                ServerCheck.canNotGet = false;
                return "100";
            }
        }
        /*
        이부분에 빙글빙글 도는 로직 넣으면 된다.
         */
        Log.e("DeQue  ",TCP_SC.Queue[TCP_SC.rear % TCP_SC.QUEUESIZE]);
        String msg =  TCP_SC.Queue[TCP_SC.rear % TCP_SC.QUEUESIZE];
        if(msg.equals(null)){
            Log.e("DeQue null_ "," ");
            msg =  TCP_SC.Queue[TCP_SC.rear % TCP_SC.QUEUESIZE];
        }

        ServerCheck.flag_forServer = false;
        TCP_SC.rear++;
        return msg;
    }
    public static synchronized boolean HasMsg() {
        if (TCP_SC.top == TCP_SC.rear)
            return false;
        else
            return true;
    }

    /**
     * 메시지 큐에 넣기
     * @param msg
     */
    public static void InQue(String msg){
        TCP_SC.Queue[TCP_SC.top % TCP_SC.QUEUESIZE] = msg;
        TCP_SC.top++;
    }

    /**
     * 받은 메시지 빼오기
     * @return
     */
    public static String DeQue(){
        while (!HasMsg()){
            if(ServerCheck.canNotGet) {
                ServerCheck.canNotGet = false;
                return "100";
            }
        }
        /*
        이부분에 빙글빙글 도는 로직 넣으면 된다.
         */
        Log.e("DeQue  ",TCP_SC.Queue[TCP_SC.rear % TCP_SC.QUEUESIZE]);
        String msg =  TCP_SC.Queue[TCP_SC.rear % TCP_SC.QUEUESIZE];
        if(msg.equals(null)){
            Log.e("DeQue null_ "," ");
            msg =  TCP_SC.Queue[TCP_SC.rear % TCP_SC.QUEUESIZE];
        }

        ServerCheck.flag_forServer = false;
        TCP_SC.rear++;
        return msg;
    }



    @Override
    public void run() {
        Selector selector = null;
        Charset cs = Charset.forName("UTF-8");

        int sizeTemp=0;
        String strTemp22="";

        try {

            System.out.println("Client :: started");

            client = SocketChannel.open();
            client.configureBlocking(false);


            client.connect(new InetSocketAddress(TCP_SC.serverIp, TCP_SC.port));
            selector = Selector.open();
            client.register(selector, SelectionKey.OP_READ);

            while (!Thread.interrupted() && !client.finishConnect()) {
                Thread.sleep(10);
            }

            System.out.println("Client :: connected");
            System.out.println("Client :: Thread.interrupted()  "+Thread.interrupted());
            System.out.println("Client :: Thread.interrupted()  "+ Thread.interrupted());
            isConnectedSocket = true;
            while (!Thread.interrupted() && !stopThread) {

                selector.select(3000);

                Iterator<SelectionKey> iter = selector.selectedKeys()
                        .iterator();
                while (!Thread.interrupted() && !stopThread && iter.hasNext()) {
                    SelectionKey key = iter.next();
                    ByteBuffer buffer = ByteBuffer.allocate(2048);


                    if (key.isReadable()) {
                        //buffer.flip();
                        int len = client.read(buffer);
                        if (len < 0) {
                            System.out.println("Client :: server closed");
                            stopThread = true;
                            break;
                        } else if (len == 0) {
                            continue;
                        }
                        buffer.flip();

                        //!@
                        //byte[] b = new byte[1024];
                        int size = buffer.remaining();

                        //if (b.length < size) {
                        //	size = b.length;
                        //}
//							buffer.get(b, 0, size);
//							buffer.put(b, 0, size);









                        CharBuffer cb = cs.decode(buffer);
                        // sayToServer("zsdasdas�޾Ҥ�������");
                        System.out.printf("From TCP Server : ");

                        strTemp = "";




                        while (cb.hasRemaining()) {
                            strTemp += cb.get();
                        }
                        System.out.println(strTemp);
                        String strs[] = strTemp.split(TCP_SC._endSendDel);
                        for(int i=0;i<strs.length;i++){
                            System.out.println(strs[i]);
                            InQue(strs[i]);
                            Log.e("서버 Get: ",strs[i]+"    "+TCP_SC.top+" "+TCP_SC.rear);

                        }

                        buffer.compact();

                    }
                }
            }
            client.socket().close();
            client.close();
            selector.close();

        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            if (client != null) {
                try {
                    client.socket().close();
                    client.close();
                    selector.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
            System.out.println("Client :: done");
        }

    }

    public synchronized void SendMsg(String text) {
        try {
            while (!isConnectedSocket){
                try {
                    Thread.sleep(0);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
            isSendFinshed = false;
            ByteBuffer buffer = ByteBuffer.allocate(4096);// Ŀ�� ���۸� ���� �ٷ�� ����
            Charset cs = Charset.forName("UTF-8");
            buffer = cs.encode(text+"\n");
//            System.out.println("TCP_보내는 메시지: "+text);
//            System.out.println("TCP_보내는 메시지 isConnectedSocket: "+isConnectedSocket);
//            System.out.println("TCP_보내는 메시지 isSendFinshed: "+isSendFinshed);
//            System.out.println("TCP_보내는 메시지 stopThread: "+stopThread);
            try {
                client.write(buffer);
            } catch (IOException e) {
                e.printStackTrace();
            }

            buffer.flip();
            buffer.compact();// ���� �κ��� ByteBuffer �� ������ �̵�
        } catch (NotYetConnectedException  e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        isSendFinshed = true;
        // int len = client.write(ByteBuffer.wrap(text.getBytes()));
    }
}