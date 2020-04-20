using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace translatorProject
{
    public class PigLatinTranslator : Translator
    {
        public override string Translate(string paragraph)
        {
            Translator pigLatin = new Translator();
            string pigLatinTranslation = "";
            Translator.consonant = "ay";
            Translator.vowel = "way";

            pigLatinTranslation = pigLatin.Translate(paragraph);

            return pigLatinTranslation;
        }
    }
}
