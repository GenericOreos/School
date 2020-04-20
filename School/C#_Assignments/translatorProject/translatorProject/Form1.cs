using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace translatorProject
{
    public partial class translatorForm : Form
    {
        public translatorForm()
        {
            InitializeComponent();
        }

        private void translatorForm_Load(object sender, EventArgs e)
        {
            rdoLatin.Checked = true;
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            txtBoxEnglish.Text = "";
            txtBoxTranslated.Text = "";
            txtBoxEnglish.Focus();
            rdoLatin.Checked = true;
        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void translatorForm_FormClosing(object sender, FormClosingEventArgs e)
        {
            DialogResult close = MessageBox.Show("Are you sure you want to exit?", "Exitway?",
                MessageBoxButtons.YesNo, MessageBoxIcon.Question);

            if(close == DialogResult.No)
            {
                e.Cancel = true;
            }
        }

        private void btnTranslate_Click(object sender, EventArgs e)
        {
            string paragraph = txtBoxEnglish.Text;

            try
            {
                if (rdoLatin.Checked)
                {
                    PigLatinTranslator pigLatin = new PigLatinTranslator();

                    txtBoxTranslated.Text = pigLatin.Translate(paragraph.Trim());
                }
                else if (rdoGreek.Checked)
                {
                    PigGreekTranslator pigGreek = new PigGreekTranslator();

                    txtBoxTranslated.Text = pigGreek.Translate(paragraph.Trim());
                }
            }
            catch
            {
                MessageBox.Show("Input textbox cannot be blank" + "\r\n" +
                    "Please enter text to translate", "ERRORWAY");
                txtBoxEnglish.Focus();
            }
        }

        private void rdoLatin_CheckedChanged(object sender, EventArgs e)
        {
            lblTranslated.Text = "Pig Latin Translation:";
        }

        private void rdoGreek_CheckedChanged(object sender, EventArgs e)
        {
            lblTranslated.Text = "Pig Greek Translation:";
        }
    }
}
