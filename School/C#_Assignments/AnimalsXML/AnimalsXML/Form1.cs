using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml;

namespace AnimalsXML
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        private List<Animal> Animals = new List<Animal>();

        

        private void Form1_Load(object sender, EventArgs e)
        {
            txtID.Focus();
            //add items to the Continent combo box
            cboContinent.Items.Add("Africa");
            cboContinent.Items.Add("Antarctica");
            cboContinent.Items.Add("Asia");
            cboContinent.Items.Add("Australia");
            cboContinent.Items.Add("Europe");
            cboContinent.Items.Add("North America");
            cboContinent.Items.Add("South America");
            //add items to the Category combo box
            cboCategory.Items.Add("Bird");
            cboCategory.Items.Add("Mammal");
        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            Animal a = new Animal();

            try
            {
                a.Id = Convert.ToInt32(txtID.Text);
                a.CommonName = txtName.Text;
                a.Species = txtSpecies.Text;
                a.Continent = cboContinent.SelectedItem.ToString();
                a.Markings = txtMarkings.Text;
                a.Category = cboCategory.SelectedItem.ToString();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.GetType() + "\r\n" + ex.Message);
            }

            if (IsDataProvided())
            {
                try
                {
                    Animals.Add(a);
                    MessageBox.Show("Animal successfully added to list");
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.GetType() + "\r\n" + ex.Message);
                }
                ClearData();
            }
            else
            {
                MessageBox.Show("All fields must be completed");
            }
            
        }
        private void ClearData()
        {
            txtID.Text = "";
            txtName.Text = "";
            txtSpecies.Text = "";
            cboContinent.SelectedIndex = -1;
            txtMarkings.Text = "";
            cboCategory.SelectedIndex = -1;
            txtID.Focus();

        }
        private bool IsDataProvided()
        {
            if(txtID.Text != "")
            {
                if(txtName.Text != "")
                {
                    if(txtSpecies.Text != "")
                    {
                        if(cboContinent.SelectedIndex != -1)
                        {
                            if(txtMarkings.Text != "")
                            {
                                if (cboCategory.SelectedIndex != -1)
                                {
                                    return true;
                                }
                                else
                                {
                                    return false;
                                }
                            }
                            else
                            {
                                return false;
                            }
                        }
                        else
                        {
                            return false;
                        }
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        private void btnSave_Click(object sender, EventArgs e)
        {
            string path = "../../Animals.xml";

            XmlWriterSettings settings = new XmlWriterSettings();
            settings.Indent = true;
            settings.IndentChars = "    ";

            XmlWriter writer = XmlWriter.Create(path, settings);
            writer.WriteStartDocument();
            writer.WriteStartElement("Animals"); //ROOT NODE

            foreach(Animal a in Animals)
            {
                if(a.CompareTo(a) == -1)
                {
                    try
                    {
                        writer.WriteStartElement("Birds");
                        writer.WriteAttributeString("ID", a.Id.ToString());
                        writer.WriteElementString("CommonName", a.CommonName);
                        writer.WriteElementString("Species", a.Species);
                        writer.WriteElementString("ContinentOrigin", a.Species);
                        writer.WriteElementString("Markings", a.Markings);
                        writer.WriteElementString("Category", a.Category);
                        writer.WriteEndElement();
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Error: " + ex.GetType() + "\r\n" + ex.Message);
                    }
                }
            }
            foreach (Animal a in Animals)
            {
                if (a.CompareTo(a) == 0)
                {
                    try
                    {
                        writer.WriteStartElement("Mammals");
                        writer.WriteAttributeString("ID", a.Id.ToString());
                        writer.WriteElementString("CommonName", a.CommonName);
                        writer.WriteElementString("Species", a.Species);
                        writer.WriteElementString("ContinentOrigin", a.Species);
                        writer.WriteElementString("Markings", a.Markings);
                        writer.WriteElementString("Category", a.Category);
                        writer.WriteEndElement();
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Error: " + ex.GetType() + "\r\n" + ex.Message);
                    }

                }
            }
            try
            {
                writer.WriteEndElement();
                writer.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.GetType() + "\r\n" + ex.Message);
            }

            if (File.Exists(@"../../Animals.xml"))
            {
                MessageBox.Show("XML file successfully created");
            }
            else
            {
                MessageBox.Show("XML file was not created");
            }
        }
    }
}
