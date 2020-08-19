# -*- coding: utf-8 -*
import speech_recognition as sr 
import pyttsx3  
from googletrans import Translator

r = sr.Recognizer()  
t = Translator()
r.energy_threshold = 2000
duration = 0.2

def speak(text, language): 
    engine = pyttsx3.init() 
    engine.say(text[language])  
    engine.runAndWait() 

def identify(audio, from_language, to_language):
    try: 
        recognized = r.recognize_google(audio, language=from_language) 
        translated = t.translate(recognized, src=from_language, dest=to_language).text
        return {
            from_language: recognized,
            to_language: translated,
        }
    except sr.RequestError as e:
        return None
    except sr.UnknownValueError:
        return None

while(True):
    try: 
        with sr.Microphone() as source: 
            r.adjust_for_ambient_noise(source, duration=duration) 
            audio = r.listen(source) 
            text = identify(audio, "en", "zh-TW")
            if text is None:
                text = identify(audio, "zh-TW", "en")
            if text is not None:
                print(text)
                speak(text, "en")
    except sr.RequestError as e:
        continue
    except sr.UnknownValueError:
        continue