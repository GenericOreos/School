using System;
using System.Configuration;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MMABOOKS_LINQ
{
    public static class DBConn
    {
        static SqlConnection conn;
        public static SqlConnection GetConnection()
        {
            //get the connection string from the app.config file
            String connString = ConfigurationManager.ConnectionStrings["myConn"].ConnectionString;
            //make a DB connection with that connection string
            if (conn == null)
            {//SINGLETON DESIGN PATTERN
                conn = new SqlConnection(connString);
            }
            return conn;
        }
    }
}
