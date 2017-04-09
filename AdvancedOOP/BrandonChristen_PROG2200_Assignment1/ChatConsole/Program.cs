using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using ChatLib;

namespace ChatConsole
{
    class Program
    {
        static void Main(string[] args)
        {
            Server server = new Server();
            bool isClient = false;


            if (args.Length > 1)
            {
                //stop them if they enter too many args
                Console.WriteLine("Too many arguments!");
                Environment.Exit(0);
            }

            else
            {
                if (args.Length > 0 && args[0] == "-server")
                {
                    //run as server        
                    isClient = false;
                    server.Connect();
                    Console.WriteLine("Started Server");

                }

                else
                {
                    //run as client
                    Console.WriteLine("Running as Client");
                    isClient = true;
                    Client client = new Client();
                    client.Connect();
                    

                }

                if (!isClient)
                {
                    //start server code
                    Console.WriteLine("Started Listening By Server");
                    Console.WriteLine("Enter I to start message send mode OR  type quit to exit");
                    while (true)
                    {
                        //check if there is a new message from the client
                        String ReceivedMessageFromClient = server.Listen();

                        if (ReceivedMessageFromClient != null)
                        {
                            //if there is a message, print it
                            Console.WriteLine(ReceivedMessageFromClient);
                        }

                        if (Console.KeyAvailable)
                        {
                            //if user inputs i then allow them to type and send a message
                            ConsoleKeyInfo UserInputKey = Console.ReadKey(true);
                            if (UserInputKey.Key == ConsoleKey.I)
                            {
                                Console.WriteLine(">>");
                                String UserMessage = Console.ReadLine();
                                if (UserMessage == "quit")
                                {
                                    //if they typed quit, close connections and shut the console
                                    server.Close();
                                    Environment.Exit(0);
                                    break;
                                }
                                else
                                {
                                    //otherwise, send the message
                                    server.Talk(UserMessage);
                                }                           
                            }

                        }
                    }
                }

                else
                {
                    //start client code
                    Client client = new Client();
                    Console.WriteLine("Enter I to start message send mode OR  type quit to exit");
                    while (true)
                    {    
                        //check if there is a message           
                        String ReceivedMessageFromServer = client.Listen();

                        if(ReceivedMessageFromServer != null)
                        {
                            //print the message
                            Console.WriteLine(ReceivedMessageFromServer);
                        }

                        if (Console.KeyAvailable)
                        {
                            //check if user inputs i
                            ConsoleKeyInfo UserInputKey = Console.ReadKey();
                            if (UserInputKey.Key == ConsoleKey.I)
                            {
                                Console.WriteLine(">>");
                                String UserMessage = Console.ReadLine();
                                if(UserMessage == "quit")
                                {
                                    //if the user types quit, then quit.
                                    client.Close();
                                    Environment.Exit(0);
                                    break;
                                }
                                else
                                {
                                    //send message
                                    client.Talk(UserMessage);
                                }
                               
                            }

                        }
                    }
                }

            }
          
        }
           



    }
}
