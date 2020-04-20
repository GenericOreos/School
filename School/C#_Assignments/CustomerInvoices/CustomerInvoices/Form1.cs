using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CustomerInvoices
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            List<Invoice> invoices = InvoiceDB.GetInvoices();
            List<Customer> customers = CustomerDB.GetCustomers();

            var Invoices = from i in invoices
                           join c in customers
                           on i.CustomerID equals c.CustomerID
                           orderby c.Name, i.InvoiceTotal descending
                           select new
                           {
                               c.Name,
                               i.InvoiceID,
                               i.InvoiceDate,
                               i.InvoiceTotal
                           };
            foreach(var inv in Invoices)
            {
                ListViewItem item = new ListViewItem(inv.Name);
                item.SubItems.Add(inv.InvoiceID.ToString());
                item.SubItems.Add(
                    Convert.ToDateTime(inv.InvoiceDate).ToShortDateString());
                item.SubItems.Add(inv.InvoiceTotal.ToString("c"));
                lvInvoices.Items.Add(item);
            }
        }
    }
}
