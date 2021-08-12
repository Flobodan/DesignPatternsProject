<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Design Patterns Introduction</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/prism.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet" />
        <script type="text/javascript" src="./quiz/quiz.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">Design Patterns</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#einführung">Einführung</a></li>
                        <li class="nav-item"><a class="nav-link" href="#singleton">Singleton</a></li>
                        <li class="nav-item"><a class="nav-link" href="#observer">Observer</a></li>
                        <li class="nav-item"><a class="nav-link" href="#mvc">MVC</a></li>
                        <li class="nav-item"><a class="nav-link" href="#übung">Übungsaufgaben</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="text-white" style="background: rgb(2,0,36); background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Design Patterns</h1>
                <p class="lead">Einführung in Singleton, Oberserver und MVC Pattern</p>
            </div>    
        </header>

        <div class="text-center" style="padding-top: 10px;">
            <img src="assets/table.png" style="width: 500px;">
        </div>

        <!-- Spacer -->
        <div style="
            margin-top: 10%;
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            height: 65px;
        "></div>

        <!-- Einführung section-->
        <section id="einführung">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h3>Was sind Design Patterns?</h3>
                        <p class="lead">
                            Design Patterns bieten <strong>Musterlösungen für wiederkehrende Probleme!</strong>
                            <br>
                            Sie bezeichnen Entwurfsmuster, also Strukturen, Modelle, Schablonen und Muster die sich bei der Entwicklung stabiler Software als Modell nutzen lassen.
                        </p>
                    </div>
                    <div class="col-lg-8" style="padding-top: 5%;">
                        <h3>Was ist ein Pattern?</h3>
                        <p class="lead">
                            Ein Pattern ist ein formale Dokumentation in Form zur modellhaften Lösung eines bestimmten Problems.
                            <br>
                            Dazu werden Entwurfsmuster nicht etwa erfunden, sondern leiten sich aus der wiederholten Anwendung aus erfolgreicher Praxis ab.
                            </p>
                    </div>
                    <div class="col-lg-8" style="padding-top: 5%;">
                        <h3>Architekturpattern als Grundlage für modernes Softwaredesign</h3>
                        <p class="lead">
                            Ursprünglich stammen Pattern aus dem Ingenieurbereich der Architektur.
                            <br>
                            Auch wenn diese Modelle sich auf die Bauarchitektur und die Städteplanung beziehen,
                            lassen sich grundlegende Prinzipien und Erkenntnisse auf Disziplinen wie Softwarearchitekturen und Softwareentwicklung übertragen.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Spacer -->
        <div style="
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            height: 65px;
        "></div>

        <!-- Singleton section-->
        <section class="bg-light" id="singleton">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">

                    <div class="col-lg-8">
                        <h2>Singleton</h2>
                        <div class="text-center">
                            <img src="assets/umlSingleton.png"/>
                        </div>
                        <p class="lead">
                            Das Entwurfsmuster Singleton wird eingesetzt, wenn von einem Objekt nur genau eine Instanz existieren darf. Man kann zwei Arten der Erzeugung von Singletons unterscheiden. Die erste Möglichkeit ist ein so genannter Lazy Singleton (Faules Einzelstück). Das bedeutet, dass die Instanz erst dann erzeugt wird, wenn sie auch wirklich benötigt wird.
                        </p>
                        <pre>
                            <code class="language-java">
public final class Singleton {

    private static Singleton instanz;
    
    private Singleton() {}
    
    public synchronized static Singleton getInstanz() {
        if(instanz==null)
            instanz = new Singleton();
        return instanz;
    }
}                           </code>
                        </pre>
                        <br>
                        <p class="lead">
                            Bei der Initialisierung wird lediglich der Speicherbereich für die Instanz reserviert. Der private Konstruktor hat hier keine Funktion. Aber dadurch, dass er als private deklariert ist, wird verhindert das von außen weitere Instanzen erzeugt werden können. Erst bei dem ersten Aufruf von "`getInstanz"' wird die Instanz erzeugt und zurückgegeben. Bei jedem weiteren Aufruf wird die bereits erzeugte Instanz zurückgegeben. Bei der Verwendung eines Lazy Singleton muss darauf geachtet werden, dass es bei Nebenläufigkeiten durch mehrere Threads nicht zu Problemen kommen kann. Daher ist es nötig die "`getInstanz"' Methode als "`synchronized"' zu deklarieren. Um dieses Problem zu umgehen kann man einen Eager Singleton (Gieriges Einzelstück) verwenden.
                        </p>
                        <pre>
                            <code class="language-java">
final class EagerSingleton{

    private final static EagerSingleton instanz = 
        new EagerSingleton();
    
    private EagerSingleton() {}
    
    public static EagerSingleton getInstanz() {
        return instanz;
    }
}                           </code>
                        </pre>

                    <!-- Pros and cons section-->
                    <br>
                    <hr>
                    <br>
                    <div>
                        <div class="row card bg-success bg-opacity-25" style="margin: 2% 0 2% 0;">
                            <p class="lead text-center">
                                <strong>Vorteile:</strong>
                            </p>
                            <br>
                        </div>
                        <div class="row card bg-danger bg-opacity-25" style="margin: 2% 0 2% 0;">
                            <p class="lead text-center">
                                <strong>Nachteile:</strong>
                            </p>
                            <br>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Spacer -->
        <div style="
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            height: 65px;
        "></div>

        <!-- Observer section-->
        <section id="observer">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Observer Pattern</h2>
                        <div class="text-center">
                            <img src="assets/umlObserver.jpg" />
                        </div>
                        <p class="lead">
                            Das Observer Pattern wird hauptsächlich in der Gestaltung von grafischen Oberflächen verwendet. Es sorgt dafür, dass bestimmte Bereiche eines Programms, beispielsweise Elemente einer grafischen Oberfläche, die identische Datenquelle verwenden und sich aktualisieren, sobald sich die Daten ändern. 
 

Dazu wird ein Programm, welches ein Observer Pattern implementiert, in zwei Teile aufgeteilt. Einmal die Subject-Klasse, welche die Daten enthält und zum anderen die Observer-Klassen und die Observer-Schnittstelle, welche die Daten einlesen und anzeigen, ausgeben oder weiterverarbeiten. Die Abbildung 4.1 zeigt die Struktur dieses Patterns. 
 

Im folgenden Quellcode sieht man ein Beispiel für ein Programm, welches das Observer Pattern verwendet. Dort gibt es ein Interface Observer, welches von den beiden Observer-Klassen RealObserver1 und RealObserver2 implementiert werden muss. Das Interface enthält eine Funktion refresh() mit der alle Observer-Klassen benachrichtigt werden, wenn sich Daten in der Subject-Klasse geändert haben. Dies geschieht in dem sich alle Observer-Klassen bei der Subject-Klasse in eine ArrayList (oder eine beliebige andere Struktur) eintragen. Wenn sich nun Daten ändern ruft die Subject-Klasse die Methode notifyObserver() auf, in welcher alle Observer-Klassen durchlaufen werden und deren refresh() Methode aufgerufen wird. In dieser Methode können dann die Observer-Klassen auf die Datenänderungen reagieren. Das Eintragen und Austragen der Observer-Klassen bei der Subject-Klasse geschieht über die Methoden addObserver(Observer) und removeObserver(Observer). 

Wie man sieht, bietet das Observer Pattern eine praktische Methode, mit welcher man dafür sorgen kann, dass bei Datenänderungen in einem Programm andere Programmteile sofort aktualisiert und an die neuen Daten angepasst werden können. 
                        </p>
                        <pre>
                            <code class="language-java">
import java.util.ArrayList;

/*
    * Hier wird das sogenannte Observerpattern vorgestellt.
    * Dieses dient zur Verwaltung von verschiedenen Observern,
    * welche auf die selben Daten zugreifen.
    */

/*
    * Dieses Interface stellt den anderen Observern
    * die refresh Methode zur Verfügung. Jeder Observer
    * muss diese Methode implementieren. In der Implementierung
    * der refresh Methode kann jeder Observer mit Daten des
    * Subjects arbeiten. Immer wenn diese sich ändern sollte
    * refresh aufgerufen werden.
    */
interface Observer{
/*
    * Muss von allen Observern 
    * implementiert werden
    */
public void refresh();
}


/*
    * Dies ist ein Observer.
    * Dieser implementiert die Schnittstelle Observer und
    * garantiert dadurch, dass die Refreshmethode implementiert ist.
    * Er wartet auf refreshs von dem Subject um zu reagieren.
    */
class RealObserver1 implements Observer{
//Bezeichnung des Observers
private int id;

//Referenz auf das Subject
private Subject subject;

//Konstruktor
public RealObserver1(int id, Subject subject){
    this.id = id;
    this.subject = subject;
}

//So reagiert der Observer bei einem Notify
public void refresh(){
    System.out.println(
        "RealObserver 1 with id " + id + 
        " refreshed. Current value is " + 
        subject.getValue());
}
}

/*
    * Dies ist eine zweite Observerklasse.
    * Dieser implementiert die Schnittstelle Observer und
    * garantiert dadurch, dass die Refreshmethode implementiert ist.
    * Er wartet auf refreshs von dem Subject um zu reagieren.
    */
class RealObserver2 implements Observer{
//Bezeichnung des Observers
private int id;

//Referenz auf das Subject
private Subject subject;

//Konstruktor
public RealObserver2(int id, Subject subject){
    this.id = id;
    this.subject = subject;
}

//So reagiert der Observer bei einem Notify
public void refresh(){
    System.out.println(
        "RealObserver 2 with id " + id + 
        " refreshed. Current value is " + 
        subject.getValue());
}
}

/*
    * In der Subjectklasse werden alle Observer in
    * einem Array, einer ArrayList oder einer ähnlichen
    * Datenstruktur gespeichert.
    * Falls sich etwas an den Daten ändert (hier: curValue)
    * werden alle Observer benachrichtigt.
    */
class Subject{
//Liste mit allen Observern
private ArrayList observer;

//Die zu verwaltenden Daten
private int curValue;

//Konstruktor
public Subject(){
    observer = new ArrayList();
    curValue = 0;
}

//Fügt einen Observer ein und benachrichtigt diesen
public void addObserver(Observer o){
    observer.add(o);
    o.refresh();
}

//Entfernt einen Observer
public void removeObserver(Observer o){
    observer.remove(o);
}

//Benachrichtigt alle Observer
public void notifyObserver(){
    for(Observer o : observer){
        o.refresh();
    }
}

//Inkrementiert die Daten
public void incValue(){
    curValue++;
    notifyObserver();
}

//Gibt die Daten zurück
public int getValue(){
    return curValue;
}
}

/*
    * Es werden ein Subject und vier Observer erstellt.
    * Nachdem die Observer bei dem Subject angemeldet wurden,
    * wird der curValue einige male inkrementiert.
    */
public class ObserverPattern {
public static void main(String[] args){
    //Erstellen des Subjects
    Subject subject = new Subject();
    
    //Erstellen der Observer
    RealObserver1 ro1a = new RealObserver1(1,subject);
    RealObserver1 ro1b = new RealObserver1(2,subject);
    RealObserver2 ro2a = new RealObserver2(3,subject);
    RealObserver2 ro2b = new RealObserver2(4,subject);
    
    //Anmelden der Observer
    subject.addObserver(ro1a);
    subject.addObserver(ro1b);
    subject.addObserver(ro2a);
    subject.addObserver(ro2b);
    
    //Mehrfaches inkrementieren der Daten
    subject.incValue();
    subject.incValue();
    subject.incValue();
}
}
                            </code>
                        </pre>

                        <!-- Pros and cons section-->
                        <br>
                        <hr>
                        <br>
                        <div>
                            <div class="row card bg-success bg-opacity-25" style="margin: 2% 0 2% 0;">
                                <p class="lead text-center">
                                    <strong>Vorteile:</strong>
                                </p>
                                <br>
                            </div>
                            <div class="row card bg-danger bg-opacity-25" style="margin: 2% 0 2% 0;">
                                <p class="lead text-center">
                                    <strong>Nachteile:</strong>
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Spacer -->
        <div style="
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            height: 65px;
        "></div>

        <!-- MVC section-->
        <section id="mvc">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>MVC Pattern</h2>
                        <div class="text-center">
                            <img src="assets/umlMVC.jpg" />
                        </div>
                        <p class="lead">
                            Das Kürzel MVC steht für Model-View-Control. 

                            Beim MVC wird ein Programm in drei unterschiedliche Teile aufgeteilt. 
                            Der Model-Teil beinhaltet dabei die Daten bzw. den Datenzugriff.  
                            Hier könnten sich klassische Objekte eines objektorientierten Programms befinden oder auch ein Datenbankzugriff oder jede andere Art von Datenverwaltung. 
                            Des Weiteren gibt es noch den View-Abschnitt. Hier befinden sich alle Ansichten.  
                            Diese zeigen normalerweise die Daten des Models an und sind komplett unabhängig von den Daten implementiert. 
                            Der dritte Teil des Patterns ist der Control-Teil. Dieser beinhaltet alle Kontrollmöglichkeiten, mit welchen ein Benutzer das Programm steuern kann. Auch dieser Teil ist normalerweise komplett unabhängig von den anderen Teilen. 
                            

                            Die einzelnen Teilbereiche besitzen in einer Umsetzung des MVC-Patterns meistens nur Referenzen auf die anderen Teilbereiche. Dabei werden nur die definierten Zugriffsmethoden verwendet. Es ist also beispielsweise nicht möglich von einer View-Klasse direkt auf Objekte der Model-Klasse zuzugreifen. 
                            

                            Im folgenden Beispiel wird ein Programm vorgestellt, welches nicht nur ein MVC-Entwurfsmuster implementiert, sondern gleichzeitig auch noch ein Observer-Pattern verwendet. Diese Vermischung der beiden Entwurfsmuster kommt sehr häufig vor, da sie gut zusammenpassen.  
                            Dabei sind die beiden so verknüpft, dass es sich bei den View-Klassen um die Observerklassen des Observer-Patterns handelt und die Model-Klasse die Subject-Klasse des Patterns repräsentiert. 
                        </p>
                        <pre>
                            <code class="language-java">
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JTextField;

interface View{
    //Muss von allen Views implementiert werden
    public void refresh();
}

class RealView extends JFrame implements View{
    //Id des Fensters
    private int id;
    
    //Referenz auf das Model
    private Model model;
    
    //JTextField des Fensters
    private JTextField txt;
    
    //Konstruktor
    public RealView(int id, Model model){
        this.id = id;
        this.model = model;
        
        setTitle("View " + id);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        
        txt = new JTextField("");
        getContentPane().add(txt);
        
        refresh();
        
        setLocation(250, 60 * id);
        pack();
        setVisible(true);
    }
    
    /*
        * Wird ausgeführt, wenn sich etwas an den
        * Daten im Model ändert
        */
    public void refresh(){
        txt.setText(
            "View " + id + ": " + 
            model.getValue());
    }
}

class ButtonView extends JFrame{	
    public ButtonView(Model model){		
        //Stellt die Eigenschaften des Fensters ein
        setTitle("ButtonView");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        
        //Fügt die Controlklasse zu dem Button hinzu
        JButton btn = new JButton("Increment");
        btn.addActionListener(new Control(model));
        getContentPane().add(btn);
        
        //Zeigt das Fenster an
        setLocation(100,100);
        pack();
        setVisible(true);		
    }
}

class Control implements ActionListener{
    //Referenz auf das Model
    private Model model;
    
    //Konstruktor
    public Control(Model model){
        this.model = model;
    }
    
    //Wird ausgeführt, wenn man den Button anklickt
    public void actionPerformed(ActionEvent evt){
        model.incValue();
    }
}

class Model{
    //Alle angemeldeten Views
    private ArrayList views;
    
    //Daten
    private int curValue;
    
    //Konstruktor
    public Model(){
        views = new ArrayList();
        curValue = 0;
    }
    
    //Fügt eine neue View hinzu
    public void addView(View view){
        views.add(view);
        view.refresh();
    }
    
    //Entfernt eine View
    public void removeView(View view){
        views.remove(view);
    }
    
    //Benachrichtigt alle Views
    public void notifyViews(){
        for(View v : views){
            v.refresh();
        }
    }
    
    //Inkrementiert die Daten
    public void incValue(){
        curValue++;
        notifyViews();
    }
    
    //Gibt die Daten zurück
    public int getValue(){
        return curValue;
    }
}

public class MVCPattern {
    public static void main(String[] args){
        /*
            * Erstellt das Model, in welchem die Daten,
            * sowie die Views verwaltet werden.
            */
        Model model = new Model();
        
        //Die Views, welche die Daten anzeigen
        RealView view1 = new RealView(1, model);
        RealView view2 = new RealView(2, model);
        
        //Die Views tragen sich bei dem Model ein
        model.addView(view1);
        model.addView(view2);
        
        //Die View zur Bedienung des Programms
        new ButtonView(model);
    }
}
                            </code>
                        </pre>

                        <!-- Pros and cons section-->
                        <br>
                        <hr>
                        <br>
                        <div>
                            <div class="row card bg-success bg-opacity-25" style="margin: 2% 0 2% 0;">
                                <p class="lead text-center">
                                    <strong>Vorteile:</strong>
                                </p>
                                <br>
                            </div>
                            <div class="row card bg-danger bg-opacity-25" style="margin: 2% 0 2% 0;">
                                <p class="lead text-center">
                                    <strong>Nachteile:</strong>
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Spacer -->
        <div style="
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            height: 65px;
        "></div>

         <!-- Übung section-->
         <section id="übung">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Übungsaufgaben</h2>

                        <!-- Quiz section -->
                        <div class="zuordnungs-quiz" lang="de">
                            <h2 id="zuordnungs-quiz-pattern">Ordne die Eigenschaften zu.</h2>
                            <p>Ordnen Sie folgende Begriffe/Dinge einander zu, indem Sie die grünen Felder mit der Maus verschieben!</p>
                            <table>
                                <tr>
                                    <td>Singleton</td>
                                    <td>genau eine Instanz</td>
                                    <td>private Konstruktor hat hier keine Funktion</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>MVC</td>
                                    <td>drei Teile</td>
                                    <td>Control-Teil</td>
                                    <td>View</td>
                                    <td>Zugriffsmethoden</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Observer</td>
                                    <td>Zwei Teile</td>
                                    <td>Subject-Klasse</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Dennis, Florian, Michele</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/prism.js"></script>
    </body>
</html>
