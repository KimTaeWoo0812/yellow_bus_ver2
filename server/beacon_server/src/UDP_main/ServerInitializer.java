package UDP_main;

import io.netty.channel.ChannelInitializer;
import io.netty.channel.ChannelPipeline;
import io.netty.channel.socket.SocketChannel;
import io.netty.handler.codec.DelimiterBasedFrameDecoder;
import io.netty.handler.codec.Delimiters;

public class ServerInitializer extends ChannelInitializer<SocketChannel> {

    private static final Server_Handler SERVER_HANDLER = new Server_Handler();

    @Override
    public void initChannel(SocketChannel ch) throws Exception {
        ChannelPipeline pipeline = ch.pipeline();

        //\n 구분자
        pipeline.addLast(new DelimiterBasedFrameDecoder(512, Delimiters.lineDelimiter()));

        pipeline.addLast(SERVER_HANDLER);
    }
}
