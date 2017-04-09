using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Sockets;

namespace ChatLib
{
    
    public class Client : ParentClass
    {
        public MessageRecievedEventHandler MessageHandler;
        public string message = "";
        static string server = "127.0.0.1";
        static Int32 port = 13000;
        TcpClient TCPclient;
        NetworkStream stream;
  

        public override void Connect()
        {
            TCPclient = new TcpClient(server, port);
            NetworkStream stream = TCPclient.GetStream();

        }

        public override void Close()
        {
            // Close everything.
            TCPclient.Close();
            stream.Close();

        }

        public override String Listen()
        {
            string recieveMessage = "";
            try
            {
                // Buffer to store the response bytes.
                Byte[] data = new Byte[256];

                // if there is data available, read it and send it back to the program.cs so it can print to console
                if (stream.DataAvailable)
                {
                    Int32 bytes = stream.Read(data, 0, data.Length);
                    recieveMessage = System.Text.Encoding.ASCII.GetString(data, 0, bytes);

                    MessageHandler(recieveMessage);
                }
                else
                {
                    return null;
                }
               
            }
            catch
            {
                //do nothing
            }
            return null;
        }

        public override void Talk(String SentMessage)
        {

            byte[] msg = System.Text.Encoding.ASCII.GetBytes(SentMessage);
            // Send back a response.
            stream.Write(msg, 0, msg.Length);

        }
    }
}
