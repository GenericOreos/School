using System;
using System.Collections.Generic;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using translatorProject;

namespace TranslatorUnitTest
{
    [TestClass] 
    //Translator.cs, PigLatinTranslator.cs, and PigGreekTranslator.cs all show 100% coverage
    public class UnitTest1
    {
        [TestMethod]
        public void Test_TRANSLATOR_CONSTRUCTOR()
        {
            Translator t = new Translator();
            Assert.IsTrue(t.GetType() == typeof(Translator));
        }

        [TestMethod]
        public void Test_PIGLATIN_CONSTRUCTOR()
        {
            PigLatinTranslator pigLatin = new PigLatinTranslator();
            Assert.IsTrue(pigLatin.GetType() == typeof(PigLatinTranslator));
        }

        [TestMethod]
        public void Test_PIGGREEK_CONSTRUCTOR()
        {
            PigGreekTranslator pigGreek = new PigGreekTranslator();
            Assert.IsTrue(pigGreek.GetType() == typeof(PigGreekTranslator));
        }

        [TestMethod]
        public void Test_BOOL_TRANSLATEWORD_TRUE()
        {
            string word = "test";
            Translator t = new Translator();

            Assert.IsTrue(t.TranslateWord(word) == true);
            
        }

        [TestMethod]
        public void Test_BOOL_TRANSLATEWORD_FALSE()
        {
            string word = "test@";
            Translator t = new Translator();

            Assert.IsTrue(t.TranslateWord(word) == false);

        }

        [TestMethod]
        public void Test_PIGLATIN_TRANSLATION()
        {
            string word = "test";
            PigLatinTranslator t = new PigLatinTranslator();
            word = t.Translate(word);
            Assert.IsTrue(word == "esttay");

        }

        [TestMethod]
        public void Test_PIGLATIN_TRANSLATION2()
        {
            string word = "Adam";
            PigLatinTranslator t = new PigLatinTranslator();
            word = t.Translate(word);
            Assert.IsTrue(word == "Adamway");

        }

        [TestMethod]
        public void Test_PIGLATIN_TRANSLATION3()
        {
            string word = "adambrewer88@gmail.com";
            PigLatinTranslator t = new PigLatinTranslator();
            word = t.Translate(word);
            Assert.IsTrue(word == "adambrewer88@gmail.com");

        }

        [TestMethod]
        public void Test_PIGGREEK_TRANSLATION()
        {
            string word = "test";
            PigGreekTranslator t = new PigGreekTranslator();
            word = t.Translate(word);
            Assert.IsTrue(word == "esttoi");
        }

        [TestMethod]
        public void Test_VOWELS_Y()
        {
            Translator t = new Translator();
            string word = "happy";
            word = t.Translate(word);
            Assert.IsTrue(word.IndexOf("y") != 0);
        }

        [TestMethod]
        public void Test_LIST()
        {
            List<string> words = new List<string>();
            words = new List<string>();
            string word = "test";

            words.Add(word);
            Assert.IsTrue(words.Contains(word));
        }
        
        [TestMethod]
        public void Test_SYMBOLS()
        {
            PigLatinTranslator t = new PigLatinTranslator();
            string phrase = "this is just a test!";
            phrase = t.Translate(phrase);
            Assert.IsTrue(phrase == "histay isway ustjay away esttay!");
        } 
    }
}
