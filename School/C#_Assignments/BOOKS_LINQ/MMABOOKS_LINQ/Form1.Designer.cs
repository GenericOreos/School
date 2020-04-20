namespace MMABOOKS_LINQ
{
    partial class Form1
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
            this.lvProducts = new System.Windows.Forms.ListView();
            this.columnHeader1 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader2 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader3 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader4 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.btnMurach = new System.Windows.Forms.Button();
            this.btnJM = new System.Windows.Forms.Button();
            this.btn1000 = new System.Windows.Forms.Button();
            this.btn55 = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // lvProducts
            // 
            this.lvProducts.Columns.AddRange(new System.Windows.Forms.ColumnHeader[] {
            this.columnHeader1,
            this.columnHeader2,
            this.columnHeader3,
            this.columnHeader4});
            this.lvProducts.Location = new System.Drawing.Point(26, 149);
            this.lvProducts.Name = "lvProducts";
            this.lvProducts.Size = new System.Drawing.Size(457, 402);
            this.lvProducts.TabIndex = 0;
            this.lvProducts.UseCompatibleStateImageBehavior = false;
            this.lvProducts.View = System.Windows.Forms.View.Details;
            // 
            // columnHeader1
            // 
            this.columnHeader1.Text = "Code";
            // 
            // columnHeader2
            // 
            this.columnHeader2.Text = "Description";
            this.columnHeader2.Width = 121;
            // 
            // columnHeader3
            // 
            this.columnHeader3.Text = "Price";
            this.columnHeader3.Width = 86;
            // 
            // columnHeader4
            // 
            this.columnHeader4.Text = "Quantity";
            this.columnHeader4.Width = 78;
            // 
            // btnMurach
            // 
            this.btnMurach.Location = new System.Drawing.Point(86, 23);
            this.btnMurach.Name = "btnMurach";
            this.btnMurach.Size = new System.Drawing.Size(318, 23);
            this.btnMurach.TabIndex = 1;
            this.btnMurach.Text = "Display Products that begin with \"Murach\"";
            this.btnMurach.UseVisualStyleBackColor = true;
            this.btnMurach.Click += new System.EventHandler(this.btnMurach_Click);
            // 
            // btnJM
            // 
            this.btnJM.Location = new System.Drawing.Point(86, 110);
            this.btnJM.Name = "btnJM";
            this.btnJM.Size = new System.Drawing.Size(318, 23);
            this.btnJM.TabIndex = 2;
            this.btnJM.Text = "Display Product Code beginning with J or M";
            this.btnJM.UseVisualStyleBackColor = true;
            this.btnJM.Click += new System.EventHandler(this.btnJM_Click);
            // 
            // btn1000
            // 
            this.btn1000.Location = new System.Drawing.Point(86, 81);
            this.btn1000.Name = "btn1000";
            this.btn1000.Size = new System.Drawing.Size(318, 23);
            this.btn1000.TabIndex = 3;
            this.btn1000.Text = "Display products with < 1000 items on hand";
            this.btn1000.UseVisualStyleBackColor = true;
            this.btn1000.Click += new System.EventHandler(this.btn1000_Click);
            // 
            // btn55
            // 
            this.btn55.Location = new System.Drawing.Point(86, 52);
            this.btn55.Name = "btn55";
            this.btn55.Size = new System.Drawing.Size(318, 23);
            this.btn55.TabIndex = 4;
            this.btn55.Text = "Display Products over $55";
            this.btn55.UseVisualStyleBackColor = true;
            this.btn55.Click += new System.EventHandler(this.btn55_Click);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 575);
            this.Controls.Add(this.btn55);
            this.Controls.Add(this.btn1000);
            this.Controls.Add(this.btnJM);
            this.Controls.Add(this.btnMurach);
            this.Controls.Add(this.lvProducts);
            this.Name = "Form1";
            this.Text = "Display Products Using LINQ";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.ListView lvProducts;
        private System.Windows.Forms.ColumnHeader columnHeader1;
        private System.Windows.Forms.ColumnHeader columnHeader2;
        private System.Windows.Forms.ColumnHeader columnHeader3;
        private System.Windows.Forms.ColumnHeader columnHeader4;
        private System.Windows.Forms.Button btnMurach;
        private System.Windows.Forms.Button btnJM;
        private System.Windows.Forms.Button btn1000;
        private System.Windows.Forms.Button btn55;
    }
}

