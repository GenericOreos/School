using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.Linq;
using System.Data.Linq.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace MMABOOKS_LINQ
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        List<Product> products = new List<Product>();
        
        private void Form1_Load(object sender, EventArgs e)
        {
            //get all the products from the database
            products = ProductsDB.GetProducts();
        }

        private void btnMurach_Click(object sender, EventArgs e)
        {
            var myQuery = from p in products
                          where p.Description.Substring(0,6) == "Murach"
                          select p;

            DisplayProducts(myQuery);
        }

        private void btn55_Click(object sender, EventArgs e)
        {
            var myQuery = from r in products
                          where r.UnitPrice > 55
                          select r;

            DisplayProducts(myQuery);
        }

        private void btn1000_Click(object sender, EventArgs e)
        {
            var myQuery = from s in products
                          where s.QuantityOnHand < 1000
                          select s;

            DisplayProducts(myQuery);
        }

        private void btnJM_Click(object sender, EventArgs e)
        {
            var myQuery = from t in products
                          where t.Code.StartsWith("J") 
                          || t.Code.StartsWith("M")
                          select t;

            DisplayProducts(myQuery);
        }
        private void DisplayProducts(IEnumerable<Product> query)
        {
            lvProducts.Items.Clear();

            foreach(var q in query)
            {
                ListViewItem item = new ListViewItem(q.Code);
                item.SubItems.Add(q.Description);
                item.SubItems.Add(q.UnitPrice.ToString());
                item.SubItems.Add(q.QuantityOnHand.ToString());
                lvProducts.Items.Add(item);
            }
            
        }
    }
}