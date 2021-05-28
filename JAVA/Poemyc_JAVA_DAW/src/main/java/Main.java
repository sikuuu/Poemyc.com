import org.json.*;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

import javax.print.Doc;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Scanner;

public class Main {

    public static void main(String[] args) throws IOException {
        boolean sortir = false;
        String URL = "";
        String cerca = "";
        String root="";
        Scanner lector = new Scanner(System.in);
        while (!sortir) {

            System.out.println(
                "###############################################\n" +
                "# Quina tasca vols realitzar?                 #\n" +
                "#                                             #\n" +
                "#  1- Recollir dades del buscador             #\n" +
                "#  2- Recuperar articles plans d'un usuari    #\n" +
                "#  3- Recuperar plans d'un usuari             #\n" +
                "#  4- Sortir                                  #\n" +
                "#                                             #\n" +
                "###############################################"
            );

            int accio = lector.nextInt();
            lector.nextLine();

            switch (accio) {
                case 1: System.out.println("Introdueix el que vols buscar:");
                    cerca = lector.next();
                    URL = "https://poemyc.com/api/buscador/"+cerca;
                    root = "buscador-"+cerca;
                    break;

                case 2: System.out.println("Introdueix l'username de l'usuari");
                    cerca = lector.next();
                    URL = "https://poemyc.com/api/userarts/"+cerca;
                    root = "articles-"+cerca;
                    break;

                case 3: System.out.println("Introdueix l'username de l'usuari");
                    cerca = lector.next();
                    URL = "https://poemyc.com/api/userplans/"+cerca;
                    root = "plans-"+cerca;
                    break;

                case 4: sortir = true; break;
                default: System.out.println("Introdueix un número vàlid"); break;
            }
            if (!sortir) {

                PrintWriter out = new PrintWriter(root+".xml");
                Document JsonApi = Jsoup.connect(URL).ignoreContentType(true).get();
                String JsonString = JsonApi.getElementsByTag("body").text();

                JSONObject json = new JSONObject(JsonString);
                String xml = XML.toString(json,root);

                out.println(xml);
                out.close();
            }
        }



    }
}
