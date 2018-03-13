# Baemax

Baemax is your personal healthcare assistant. Inspired from the fictional character “Baymax”, our conversational bot does quite the same.
If you’re feeling blue, Baemax will engage you in a conversation, ask about your symptoms, correspondingly suggest some home remedies for it.
Let it be a common cold or a headache or stomachache, Baemax will give you simple tips/ hacks (strictly non-medicinal) to make you feel alright.
Say you’re feeling sad, Baemax will prompt you with a perfect playlist that can ease you up and make you feel better (it has great taste in music) or share something interesting and entertaining with you.
For women on periods, say you’re craving for something sweet, Baemax will find you healthy substitutes for chocolates and will also suggest some home remedies for dealing with cramps.
Depression has become an emerging problem and must be stemmed at roots. Baemax can be a part of counsel and engage them with games and warmth.
Trust me this is just the beginning of endless series of applications of Baemax.
About time you found a real Bae. Don't you think?

Technical aspects - 

What you're seeing is a simple Web application made using HTML5, JavaScript and jQuery.
Initially, the user can communicate by typing or give a voice  command.
Using WebKit Speech Synthesis, the program converts voice to text and sends it to the api. This text is run through an NLP Parser code written in python which breaks the sentences into phrases. Matches the input and passes the subsequent output in the form of a JSON file.
This JSON file reaches our Application where it gets converted back to Voice.

Demo - http://gofornaman.co/baemax
