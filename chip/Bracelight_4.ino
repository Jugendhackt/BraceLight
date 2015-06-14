

int LED_ROT = 3;
int LED_GRUEN = 5;
int LED_BLAU = 6;
int LED_2_ROT = 9;
int LED_2_GRUEN = 10;
int LED_2_BLAU = 11;
int LED_GELB = 13;

int data = 0;


void setup() {
pinMode(LED_ROT, OUTPUT);
pinMode(LED_GRUEN, OUTPUT);
pinMode(LED_BLAU, OUTPUT);
pinMode(LED_2_ROT, OUTPUT);
pinMode(LED_2_GRUEN, OUTPUT);
pinMode(LED_2_BLAU, OUTPUT);
pinMode(LED_GELB, OUTPUT);

digitalWrite(LED_BLAU, HIGH);
digitalWrite(LED_ROT, HIGH);
digitalWrite(LED_GRUEN, HIGH);
digitalWrite(LED_2_BLAU, HIGH);
digitalWrite(LED_2_ROT, HIGH);
digitalWrite(LED_2_GRUEN, HIGH);
digitalWrite(LED_GELB, LOW);
Serial.begin(38400);
}

void loop() {
 
    while (Serial.available() > 0) {  
    data = Serial.read();
    
    /*
      switch(data) {
        
        case('c'):
        digitalWrite(LED_ROT, LOW);
        Serial.println("c");
        call();
        break;
        
        case('s'):
        Serial.println("s");
        sms();
        break;
        
        case('l'):
        Serial.println("l");
        regen();
        break;
        } 
     
    */ 
        if (data == 'c')
        {
          for(int f = 0; f < 50; f++) {
          digitalWrite(LED_GELB, HIGH);
          digitalWrite(LED_ROT, LOW);
          digitalWrite(LED_2_ROT, LOW);
          delay(50);
          digitalWrite(LED_ROT, HIGH);
          digitalWrite(LED_2_ROT, HIGH);
          delay(50);
        }
        }
        else if (data == 's')
        {
           for(int z = 0; z < 20; z++) {
            digitalWrite(LED_GRUEN, LOW);
            digitalWrite(LED_2_GRUEN, LOW);
            delay(75);
            digitalWrite(LED_2_GRUEN, HIGH);
            digitalWrite(LED_GRUEN, HIGH);
            delay(75);
        }
        }
        else if (data == 'l')
        {
            for(int r = 0; r < 7; r++) {
            digitalWrite(LED_BLAU, LOW);
            digitalWrite(LED_2_BLAU, LOW);
            delay(2000);
            digitalWrite(LED_BLAU, HIGH);
            digitalWrite(LED_2_BLAU, HIGH);
            delay(2000);
        }
          }



/*
if (Serial.available() > 0) {
    int inByte = Serial.read();
    // do something different depending on the character received.  
    // The switch statement expects single number values for each case;
    // in this exmaple, though, you're using single quotes to tell
    // the controller to get the ASCII value for the character.  For
    // example 'a' = 97, 'b' = 98, and so forth:

    switch (inByte) {
    case 'c':    
      digitalWrite(LED_ROT, LOW);
      digitalWrite(LED_2_ROT, LOW);
      break;
    case 's':    
      digitalWrite(LED_2_GRUEN, LOW);
      break;
    case 'l':    
      digitalWrite(LED_BLAU, LOW);
      break;
      */
}
}

