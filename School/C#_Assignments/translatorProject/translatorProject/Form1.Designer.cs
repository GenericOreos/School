namespace translatorProject
{
    partial class translatorForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.txtBoxEnglish = new System.Windows.Forms.TextBox();
            this.txtBoxTranslated = new System.Windows.Forms.TextBox();
            this.lblEnglish = new System.Windows.Forms.Label();
            this.lblTranslated = new System.Windows.Forms.Label();
            this.rdoLatin = new System.Windows.Forms.RadioButton();
            this.rdoGreek = new System.Windows.Forms.RadioButton();
            this.btnTranslate = new System.Windows.Forms.Button();
            this.btnClear = new System.Windows.Forms.Button();
            this.btnExit = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // txtBoxEnglish
            // 
            this.txtBoxEnglish.Location = new System.Drawing.Point(64, 71);
            this.txtBoxEnglish.Multiline = true;
            this.txtBoxEnglish.Name = "txtBoxEnglish";
            this.txtBoxEnglish.Size = new System.Drawing.Size(373, 164);
            this.txtBoxEnglish.TabIndex = 0;
            // 
            // txtBoxTranslated
            // 
            this.txtBoxTranslated.Location = new System.Drawing.Point(64, 333);
            this.txtBoxTranslated.Multiline = true;
            this.txtBoxTranslated.Name = "txtBoxTranslated";
            this.txtBoxTranslated.ReadOnly = true;
            this.txtBoxTranslated.Size = new System.Drawing.Size(373, 164);
            this.txtBoxTranslated.TabIndex = 1;
            // 
            // lblEnglish
            // 
            this.lblEnglish.AutoSize = true;
            this.lblEnglish.Location = new System.Drawing.Point(64, 37);
            this.lblEnglish.Name = "lblEnglish";
            this.lblEnglish.Size = new System.Drawing.Size(116, 13);
            this.lblEnglish.TabIndex = 2;
            this.lblEnglish.Text = "Enter English text here:";
            // 
            // lblTranslated
            // 
            this.lblTranslated.AutoSize = true;
            this.lblTranslated.Location = new System.Drawing.Point(64, 294);
            this.lblTranslated.Name = "lblTranslated";
            this.lblTranslated.Size = new System.Drawing.Size(106, 13);
            this.lblTranslated.TabIndex = 3;
            this.lblTranslated.Text = "Pig Latin Translation:";
            // 
            // rdoLatin
            // 
            this.rdoLatin.AutoSize = true;
            this.rdoLatin.Location = new System.Drawing.Point(64, 256);
            this.rdoLatin.Name = "rdoLatin";
            this.rdoLatin.Size = new System.Drawing.Size(66, 17);
            this.rdoLatin.TabIndex = 4;
            this.rdoLatin.TabStop = true;
            this.rdoLatin.Text = "Pig Latin";
            this.rdoLatin.UseVisualStyleBackColor = true;
            this.rdoLatin.CheckedChanged += new System.EventHandler(this.rdoLatin_CheckedChanged);
            // 
            // rdoGreek
            // 
            this.rdoGreek.AutoSize = true;
            this.rdoGreek.Location = new System.Drawing.Point(189, 256);
            this.rdoGreek.Name = "rdoGreek";
            this.rdoGreek.Size = new System.Drawing.Size(72, 17);
            this.rdoGreek.TabIndex = 5;
            this.rdoGreek.TabStop = true;
            this.rdoGreek.Text = "Pig Greek";
            this.rdoGreek.UseVisualStyleBackColor = true;
            this.rdoGreek.CheckedChanged += new System.EventHandler(this.rdoGreek_CheckedChanged);
            // 
            // btnTranslate
            // 
            this.btnTranslate.Location = new System.Drawing.Point(67, 534);
            this.btnTranslate.Name = "btnTranslate";
            this.btnTranslate.Size = new System.Drawing.Size(103, 45);
            this.btnTranslate.TabIndex = 6;
            this.btnTranslate.Text = "Translate";
            this.btnTranslate.UseVisualStyleBackColor = true;
            this.btnTranslate.Click += new System.EventHandler(this.btnTranslate_Click);
            // 
            // btnClear
            // 
            this.btnClear.Location = new System.Drawing.Point(203, 534);
            this.btnClear.Name = "btnClear";
            this.btnClear.Size = new System.Drawing.Size(103, 45);
            this.btnClear.TabIndex = 7;
            this.btnClear.Text = "Clear";
            this.btnClear.UseVisualStyleBackColor = true;
            this.btnClear.Click += new System.EventHandler(this.btnClear_Click);
            // 
            // btnExit
            // 
            this.btnExit.Location = new System.Drawing.Point(334, 534);
            this.btnExit.Name = "btnExit";
            this.btnExit.Size = new System.Drawing.Size(103, 45);
            this.btnExit.TabIndex = 8;
            this.btnExit.Text = "Exit";
            this.btnExit.UseVisualStyleBackColor = true;
            this.btnExit.Click += new System.EventHandler(this.btnExit_Click);
            // 
            // translatorForm
            // 
            this.AcceptButton = this.btnTranslate;
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(509, 614);
            this.Controls.Add(this.btnExit);
            this.Controls.Add(this.btnClear);
            this.Controls.Add(this.btnTranslate);
            this.Controls.Add(this.rdoGreek);
            this.Controls.Add(this.rdoLatin);
            this.Controls.Add(this.lblTranslated);
            this.Controls.Add(this.lblEnglish);
            this.Controls.Add(this.txtBoxTranslated);
            this.Controls.Add(this.txtBoxEnglish);
            this.Name = "translatorForm";
            this.Text = "Pig Latin/Pig Greek Translator";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.translatorForm_FormClosing);
            this.Load += new System.EventHandler(this.translatorForm_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox txtBoxEnglish;
        private System.Windows.Forms.TextBox txtBoxTranslated;
        private System.Windows.Forms.Label lblEnglish;
        private System.Windows.Forms.Label lblTranslated;
        private System.Windows.Forms.RadioButton rdoLatin;
        private System.Windows.Forms.RadioButton rdoGreek;
        private System.Windows.Forms.Button btnTranslate;
        private System.Windows.Forms.Button btnClear;
        private System.Windows.Forms.Button btnExit;
    }
}

