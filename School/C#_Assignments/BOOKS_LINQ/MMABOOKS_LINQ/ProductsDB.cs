using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MMABOOKS_LINQ
{
    class ProductsDB
    {
        public static List<Product> GetProducts()
        {
            SqlConnection conn = DBConn.GetConnection();
            
            string sqlString = "select ProductCode, " + 
                "Description, UnitPrice, OnHandQuantity " +
                "From products";
            SqlCommand command = new SqlCommand(sqlString, conn);
            List<Product> products = new List<Product>();
            
            conn.Open();
            SqlDataReader reader = command.ExecuteReader();
            while (reader.Read())
            {
                Product prod = new Product();
                prod.Code = reader["ProductCode"].ToString();
                prod.Description = reader["Description"].ToString();
                prod.UnitPrice = Convert.ToDecimal(reader["UnitPrice"]);
                prod.QuantityOnHand = Convert.ToInt32(reader["OnHandQuantity"]);
                products.Add(prod);
            }
            conn.Close();
            return products;
        }
    }
}
