using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ChatLib
{
    public abstract class ParentClass
    {
        //method to set up connections
        abstract public void Connect();

        //method to listen for messages, and to return them to progam.cs
        abstract public String Listen();

        //method to send messages
        abstract public void Talk(String SentMessage = "");

        //method to close everything
        abstract public void Close();

    }
}
