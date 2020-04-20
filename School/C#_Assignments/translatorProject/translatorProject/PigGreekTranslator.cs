using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace translatorProject
{
    public class PigGreekTranslator : Translator
    {
        public override string Translate(string paragraph)
        {
            Translator pigGreek = new Translator();
            string pigGreekTranslation = "";
            Translator.consonant = "oi";
            Translator.vowel = "omatos";

            pigGreekTranslation = pigGreek.Translate(paragraph);

            return pigGreekTranslation;
        }

    }
}
