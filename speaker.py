# -*- coding: utf-8 -*
from gtts import gTTS
from pygame import mixer
import tempfile
import time
import csv
import os.path

def speak(sentence, lang):
    with tempfile.NamedTemporaryFile(delete=True) as fp:
        tts=gTTS(text=sentence, lang=lang)
        tts.save('{}.mp3'.format(fp.name))
        mixer.init()
        mixer.music.load('{}.mp3'.format(fp.name))
        mixer.music.play(1)
    while mixer.music.get_busy():
        time.sleep(0.1)

def speak_en(sentence):
    speak(sentence, "en")

def speak_zh(sentence):
    speak(sentence, "zh-tw")

def save(sentence, lang, filename):
    with tempfile.NamedTemporaryFile() as fp:
        tts=gTTS(text=sentence, lang=lang)
        tts.save((filename+'.mp3').format(fp.name))
        mixer.init()
    while mixer.music.get_busy():
        time.sleep(0.1)

def save_en(sentence, filename):
    save(sentence, "en", filename)
    print("File saved to " + filename)

def save_zh_tw(sentence, filename):
    save(sentence, "zh-tw", filename)
    print("File saved to " + filename)

def save_ja(sentence, filename):
    save(sentence, "ja", filename)
    print("File saved to " + filename)

def save_ko(sentence, filename):
    save(sentence, "ko", filename)
    print("File saved to " + filename)

with open('notes.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    for row in csv_reader:
        # en
        if not os.path.exists("en/" + row[0].strip() + ".mp3"):
            save_en(row[0].strip(), "en/" + row[0].strip())
        # zh-tw
        if not os.path.exists("zh-tw/" + row[0].strip() + ".mp3"):
            save_zh_tw(row[1].strip(), "zh-tw/" + row[0].strip())
        # ja
        if not os.path.exists("ja/" + row[0].strip() + ".mp3"):
            save_ja(row[2].strip(), "ja/" + row[0].strip())
        # ko
        if not os.path.exists("ko/" + row[0].strip() + ".mp3"):
            save_ko(row[3].strip(), "ko/" + row[0].strip())