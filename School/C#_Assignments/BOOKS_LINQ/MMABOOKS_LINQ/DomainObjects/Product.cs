using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MMABOOKS_LINQ
{
    public class Product
    {
        private string code;
        private string description;
        private decimal unitPrice;
        private int quantityOnHand;
        public Product()
        {
            //default constructor
        }
        public Product(string code, string description, decimal unitPrice, int quantityOnHand)
        {
            this.Code = code;
            this.Description = description;
            this.unitPrice = unitPrice;
            this.QuantityOnHand = quantityOnHand;
        }

        public string Code { get => code; set => code = value; }
        public string Description { get => description; set => description = value; }
        public decimal UnitPrice { get => unitPrice; set => unitPrice = value; }
        public int QuantityOnHand { get => quantityOnHand; set => quantityOnHand = value; }
    }
}
