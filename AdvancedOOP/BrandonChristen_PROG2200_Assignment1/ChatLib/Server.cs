using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Sockets;
using System.Net;

namespace ChatLib
{
    public class Server : ParentClass
    {
        TcpListener server = null;
        // Buffer for reading data
        Byte[] bytes = new Byte[256];
        String data = null;
        TcpClient client = null;
        NetworkStream stream;
        String Message;
        
        public override void Close()
        {
            client.Close();
            server.Stop();
            stream.Close();
        }

        public override void Connect()
        {

            try
            {
                // Set the TcpListener on port 13000.
                Int32 port = 13000;
                IPAddress localAddr = IPAddress.Parse("127.0.0.1");

                // TcpListener server = new TcpListener(port);
                server = new TcpListener(localAddr, port);

                // Start listening for client requests.
                server.Start();


                // Perform a blocking call to accept requests.
                // You could also user server.AcceptSocket() here.
                client = server.AcceptTcpClient();

                // Get a stream object for reading and writing
                stream = client.GetStream();


            }
            catch (SocketException e)
            {
                Message = "Socket exception";
            }

    

        }//end connect

        public override String Listen()
        {           
            // if theres data available send it to program.cs to be printed out
            if (stream.DataAvailable)
            {
                Int32 data = stream.Read(bytes, 0, bytes.Length);
                Message = System.Text.Encoding.ASCII.GetString(bytes, 0, data);
                return Message;
            }
            else
            {
                return null;
            }
            
        }

        public override void Talk(String SentMessage)
        {
            if (stream.CanWrite)
            {
                byte[] msg = System.Text.Encoding.ASCII.GetBytes(SentMessage);
                // Send back a response.
                stream.Write(msg, 0, msg.Length);
            }


        }

    }
}
