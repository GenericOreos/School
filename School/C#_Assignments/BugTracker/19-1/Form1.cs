using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace _19_1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void customersBindingNavigatorSaveItem_Click(object sender, EventArgs e)
        {
            this.Validate();
            this.customersBindingSource.EndEdit();
            this.tableAdapterManager.UpdateAll(this.techSupportDataSet);

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            try
            {
                // TODO: This line of code loads data into the 'techSupportDataSet.Incidents' table. You can move, or remove it, as needed.
                this.incidentsTableAdapter.Fill(this.techSupportDataSet.Incidents);
                // TODO: This line of code loads data into the 'techSupportDataSet.Customers' table. You can move, or remove it, as needed.
                this.customersTableAdapter.Fill(this.techSupportDataSet.Customers);
            }
            catch (SqlException ex)
            {
                MessageBox.Show("Error: " + ex.GetType() + "\r\n" +
                    ex.Message);
            }
            catch (DataException ex)
            {
                MessageBox.Show("Error: " + ex.GetType() + "\r\n" +
                    ex.Message);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.GetType() + "\r\n" +
                    ex.Message);
            }


        }

        private void fillByCustomerIDToolStripButton_Click(object sender, EventArgs e)
        {
            try
            {
                this.customersTableAdapter.FillByCustomerID(this.techSupportDataSet.Customers, ((int)(System.Convert.ChangeType(customerIDToolStripTextBox.Text, typeof(int)))));
            }
            catch (System.Exception ex)
            {
                System.Windows.Forms.MessageBox.Show(ex.Message);
            }

        }
    }
}
