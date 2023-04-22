import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

public class haha {
    public static void main(String[] args) throws FileNotFoundException {
        String s = "";
        File file=new File("./text.txt");
        Scanner sc=new Scanner(file);
        while(sc.hasNextLine()){
            s = sc.nextLine();
            s = s.split("       ")[1];
            System.out.println("git checkout HEAD \"" + s + "\"" + " \"" + s + "\"");
        }
    }
}