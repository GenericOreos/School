using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace translatorProject
{
    public class Translator : ITranslator
    {
        public static string startTranslation = "";
        public string vowels = "AEIUOaeiuo";
        public static string y = "Yy";
        public static string firstLetter = "";
        public static string restOfWord = "";
        public static int currentVowel = -1;
        public static string consonant = "";
        public static string vowel = "";
        public static string singleQuote = "'";
        public static string doubleQuote = "\"";

        List<string> punctuation = new List<string>
        {
            ".", ",", "!", "?", ";", ":","'","\""
        };

        List<string> capitalLetters = new List<string>
        {
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O",
            "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"
        };

        List<string> doNotTranslate = new List<string>
        {
            "1","2","3","4","5", "6","7","8","9","0","@","#","%","+","-","/","*","&"
        };

        List<string> Consonants = new List<string>
        {
            "B", "C", "D", "F", "G", "H", "J", "K", "L", "M", "N",
            "P", "Q", "R", "S", "T", "V", "X", "Z", "W", "Y"
        };

        public virtual string Translate(string paragraph) //TRANSLATE METHOD begins
        {
            List<string> words = new List<string>();
            words = new List<string>();

            foreach (string word in paragraph.Split(' '))
            {
                if (TranslateWord(word) == true) 
                    //run TranslateWord() to check for any symbols or numbers
                {
                    firstLetter = word.Substring(0, 1);
                    restOfWord = word.Substring(1, word.Length - 1);
                    currentVowel = vowels.IndexOf(firstLetter);

                    if (currentVowel == -1) //if first letter is not a vowel (consonant)
                    {
                        foreach (char c in word)
                        {
                            for (int i = 0; i < Consonants.Count; i++)
                            {
                                if (c.ToString().ToUpper() == Consonants[i])
                                {
                                  MoveConsonant(word);
                                }
                            } 
                        }
                        words.Add(restOfWord + firstLetter + consonant); 
                        //takes the word and places the first letter at the end,
                        //adds variable at the end of the new word for the "ay", "way", etc.
                    }
                    else //if the first letter is a vowel, just add "way" to the end
                    {
                        words.Add(word + vowel);
                    }
                }
                else
                {
                    words.Add(word);// if TranslateWord() returns false, it found symbols or 
                                   //numbers within the word, and will not translate it
                }
            }//end of foreach loop
            
            for (int i = 0; i < words.Count; i++)
            {
                if (TranslateWord(words[i]) == true)
                {
                    for (int p = 0; p < punctuation.Count; p++)
                    {
                        if (words[i].Contains(punctuation[p]))
                        {
                            words[i] = words[i].Replace(punctuation[p], "");
                            words[i] = words[i].Insert(words[i].Length, punctuation[p]);
                        }
                    }
                }
            }
            for (int i = 0; i < words.Count; i++)
            {
                words[i] = MoveCapital(words[i]);
            }
            startTranslation = string.Join(" ", words.ToArray());
            return startTranslation;
        }// end of Translate method
        
        public bool TranslateWord(string word)
        {
           foreach(string symbol in doNotTranslate)
           {
               if (word.Contains(symbol))
               {
                    return false;
               }
           }
           return true;
        }// end of TranslateWord method
        public string MoveConsonant(string word)
        {
            List<char> letters = word.ToList();
            char first = letters[0];
            string firstLetter = first.ToString();
            string restOfWord = word.Substring(1, word.Length - 1);
            word = restOfWord + firstLetter;

            return word;
        }
        public string MoveCapital(string word)
        {
            foreach(char letter in word)
            {
                for (int i = 0; i < capitalLetters.Count; i++)
                {
                    if (word.Contains(capitalLetters[i]))
                    {
                        word = word.ToLower();
                        firstLetter = word.Substring(0, 1).ToUpper();
                        restOfWord = word.Substring(1, word.Length - 1);
                        word = firstLetter + restOfWord;
                    }
                }
            }
            return word;
        }
    }
}



