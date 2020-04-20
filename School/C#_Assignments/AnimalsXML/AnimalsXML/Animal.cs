using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AnimalsXML
{
    public class Animal : IComparable
    {
        private int id;
        private string commonName;
        private string species;
        private string continent;
        private string markings;
        private string category;

        public Animal()
        {
        }

        public Animal(int id, string commonName, string species, string continent, string markings, string category)
        {
            this.Id = id;
            this.CommonName = commonName;
            this.Species = species;
            this.Continent = continent;
            this.Markings = markings;
            this.Category = category;
        }

        public int Id { get => id; set => id = value; }
        public string CommonName { get => commonName; set => commonName = value; }
        public string Species { get => species; set => species = value; }
        public string Continent { get => continent; set => continent = value; }
        public string Markings { get => markings; set => markings = value; }
        public string Category { get => category; set => category = value; }

        public int CompareTo(object ob)
        {
            Animal a = (Animal)ob;

            if(a.category == "Bird")
            {
                return -1;
            }
            else if (a.category == "Mammal")
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }
    }
}
