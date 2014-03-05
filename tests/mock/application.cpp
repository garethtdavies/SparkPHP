//This is a simple example file that we can flash to the core
//Simply blinks the in-built LED

//Define the LED pin
int led = D7;

// This routine runs only once upon reset
void setup() {
  pinMode(led, OUTPUT);
}

void loop() {
  digitalWrite(led, HIGH);   // Turn ON the LED pin
  delay(1000);               // Wait for 1000mS = 1 second
  digitalWrite(led, LOW);    // Turn OFF the LED pin
  delay(1000);               // Wait for 1 second in off mode
}