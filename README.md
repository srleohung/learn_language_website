# learn_language_website

# Install
Python 3.7.5 is recommended.
```bash
pip install -r requirements.txt
```
Mac OS
```bash
brew install portaudio
python3 -B -u -m pip -v install --no-warn-script-location --no-cache-dir --global-option=build_ext --global-option="-I$(brew --prefix portaudio)/include" --global-option="-L$(brew --prefix portaudio)/lib" pyaudio
```

# Usage
Use speaker.py to generate sound files.
```bash
python speaker.py
```
Start webpage using PHP.
```bash
php -S localhost:3000
```
Webpage URL.
```
http://localhost:3000/learn.php
```
Use listener.py to real-time translation.
```bash
python listener.py
```