package no2;

import java.util.ArrayList;

public class perpustakaan {
    public ArrayList<bukuFiksi> koleksiFiksi;
    public ArrayList<nonFiksi> koleksiNonFiksi;

    public perpustakaan() {
        koleksiFiksi = new ArrayList<>();
        koleksiNonFiksi = new ArrayList<>();
    }

    public void tambahBukuFiksi(bukuFiksi buku) {
        koleksiFiksi.add(buku);
    }

    public void tambahBukuNonFiksi(nonFiksi buku) {
        koleksiNonFiksi.add(buku);
    }

    public void tampilkanKoleksi() {
        System.out.println("\n=== Koleksi Buku Fiksi ===");
        for (bukuFiksi buku : koleksiFiksi) {
            buku.infoFiksi();
        }

        System.out.println("\n=== Koleksi Buku Non-Fiksi ===");
        for (nonFiksi buku : koleksiNonFiksi) {
            buku.infoNonFiksi();
        }
    }
}
