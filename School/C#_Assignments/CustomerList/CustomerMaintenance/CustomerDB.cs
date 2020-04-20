using System;
using System.Collections.Generic;
using System.IO;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CustomerMaintenance
{
    /// <summary>
    /// CustomerDB class
    /// </summary>
    public static class CustomerDB
	{
        // TODO: Add the directory and path here
        private const string directory = @"C:\DB Programming\Files";
        private const string path = directory + @"\Customers.txt";

        public static void SaveCustomers(List<Customer> customers)
		{
            // TODO: Add code that writes the List<> of Customer objects 
            // to a text file
            StreamWriter outText = new StreamWriter(new FileStream(path, FileMode.Create,
                FileAccess.Write));

            foreach(Customer c in customers)
            {
                outText.Write(c.FirstName + "|");
                outText.Write(c.LastName + "|");
                outText.WriteLine(c.Email);
            }
            outText.Close();
		}

        public static List<Customer> GetCustomers()
		{
            List<Customer> customers = new List<Customer>();

            // TODO: Add code that reads a List<> of Customer objects 
            // from a text file
            if (!Directory.Exists(directory)) Directory.CreateDirectory(directory);

            StreamReader inText = new StreamReader(new FileStream(path, FileMode.OpenOrCreate,
                FileAccess.Read));

            while(inText.Peek() != -1)
            {
                string row = inText.ReadLine();
                string[] columns = row.Split('|');
                Customer c = new Customer();
                c.FirstName = columns[0];
                c.LastName = columns[1];
                c.Email = columns[2];
                customers.Add(c);
            }
            inText.Close();
            return customers;
		}
	}
}
