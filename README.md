# Informatică pentru afaceri | AMIA
#### Student: Radu Dragan | 2020

link:
http://fotodex.ro/tema_sql/

###  Descrierea Tabelelor
##### Tabela Scule
Acest tabel contine un inventar al tuturor sculelor. Ce pot fi inchiriate sau care sunt inchiriate.
| ID Scula | Nume scula | Stare | Pret | valoare reziduala | Este Inchiriata | Data achizitie |
| --- | --- | --- | --- | --- | --- | --- | 
| INT 6 uniq auto increment | String 50 | INT 1 | INT 5 | INT 5 | BOOLEAN | DATE  |
| Numar unic pentru identificarea fiecarui scule | Numele fiecarui scula din inventar | Starea in care se afla scula din inventar | Pretul initial de achizitie al sculei | Valoarea actuala a sculei dupa folosinta | Indicator care imi spune daca produsul este inchidirat la acest moment | Data de achizitie a sculei |

```sql
CREATE TABLE scule(
    IdScula int AUTO_INCREMENT PRIMARY KEY,
    NumeScula varchar(50),
    Stare int,
    Pret float(5),
    ValRezid float(5),
    IsRented boolean,
    DataAchizitie date
)
```

#####  TABELA CLIENT
Acest tabel contine un inventar al tuturor clientilor existenti.
| ID CLIENT | Nume | Prenume | Telefon | Email | 
| --- | --- | --- | --- | --- |
| INT 6 uniq auto increment | String 50 | String 50 | String 10 | String 50 |
| Numar unic pentru identifcarea fiecarui client | Numele clientului | Prenumele clientului | Telefonul clientului | Emailul clientului |

```sql
CREATE TABLE client (
    idClient int PRIMARY KEY AUTO_INCREMENT,
    Nume varchar(50) NOT NULL,
    Prenume varchar(50) NOT NULL,
    Telefon varchar(10) NOT NULL,
    email varchar(50) NOT NULL
)
```

##### TABELA INCHIRIERE
Acest tabel contine un inventar al inchirierilor facute.
| ID inchirire | ID Scula | ID Client | Data iesire | Data intrare | IS PAYED | NOTE |
| --- | --- | --- | --- | --- | --- | --- |
| INT 6 uniq auto increment | INT 6 FK | INT 6 FK | DATA | DATA | BOOLEAN | STRING 500 | 
| Numar unic pentru identificarea fiecarei inchirieri | Numar unic din tabela scule folosit pentru identificarea sculei | Numar unic din tabela clienti pentru identificarea fiecarui client | Data la care inchirierea a inceput | Data la care inchiriera s-a terminat | A fost plata acceptata | Alte detalii, ori ce alt text care nu se incadreaza in nici un alt camp |

```sql
create TABLE inchiriere(
    IdInchiriere int PRIMARY KEY AUTO_INCREMENT,
    IDScula int,
    IdClient int,
    DataIesire date NOT NULL,
    DataIntrate date,
    IsPaid boolean,
    Note varchar(500),
    FOREIGN KEY (IdScula) REFERENCES scule(IdScula),
    FOREIGN KEY (IdClient) REFERENCES client(IdClient)
)
```

### Lista Comenzi

1. *TOATA TABELA 'SCULE' cu o limita de 50 ordonata alfabetic*
```sql
SELECT IdScula, NumeScula, Stare, Pret, ValRezid, IsRented, DataAchizitie FROM scule ORDER BY NumeScula ASC LIMIT 50
```
| IdScula | NumeScula | Stare | Pret | ValRezid | IsRented | DataAchiziti |
| --- | --- | --- | --- | --- | --- | --- |
| 1 | Ciocan 500g cu coada scurta | 2 | 20 | 1 | 0 | 2018-07-13 |
| 2 | Surubelnita PZ2/M10x5 | 8 | 8 | 7 | 1 | 2018-07-13 |
| 3 | Cutter | 9 | 3 | 3 | 0 | 2018-01-04 |
| 4 | WolfCraft 5205 | 9 | 25 | 22 | 0 | 2018-12-19 |
| 5 | Between | 8 | 5 | 4 | 0 | 2018-01-29 |
| 6 | Cantar de mana | 8 | 3 | 3 | 0 | 2018-01-06 |
| 7 | Hot glue gun Stanley | 6 | 30 | 3 | 0 | 2018-01-29 |


2. *Valoarea totala a tuturor sculelor din tabela Scule*
```sql
SELECT SUM(Pret) FROM scule
```
| SUM(Pret) |
| --- |
| 94 |

3. *Valoarea medie reziduala scule*
```sql
SELECT AVG(ValRezid) FROM scule
```
| AVG(ValRezid) |
| --- |
| 6.14 |

4. *Scule inchiriate*
```sql
SELECT COUNT(IdScula) FROM scule WHERE IsRented = 1
```
| COUNT(IdScula) |
| --- |
| 1 |

5. *Valoare pierduta catre depreciere*
```sql
SELECT SUM(Pret - ValRezid) FROM scule
```
| SUM(Pret - ValRezid) |
| --- |
| 51 |


6. *TOATA TABELA 'Client'*
```sql
SELECT idClient, Nume, Prenume, Telefon, email FROM client ORDER BY Nume ASC LIMIT 50
```
| idClient | Nume | Prenume | Telefon | email |
| --- | --- | --- | --- | --- |
| 1 | Dragan | Radu | 0771050157 | radu@fotodex.ro |
| 2 | Armanad | Anca | 0912312 | armand@anca.ro |

7. *Numar total clienti*
```sql
SELECT COUNT(Nume) FROM client
```
| COUNT(Nume) |
| --- |
| 2 |


8. *Insert client nou*
```sql
INSERT INTO client (Nume, Prenume, Telefon, email) VALUES ('Ionescu','Radu', '0742056799', 'radu@dragan.ro')
```

9. *Insert scula*
```sql
INSERT INTO scule (NumeScula, Stare, Pret, ValRezid, IsRented, DataAchizitie) VALUES ('Ciocan Stanley 160Z','5', '8', '6', '1', '1/5/2018')
```

### Concluzii
Bazele de date sunt o unealta moderna pentru a putea getiona un volum mare date inventariate. In aceast caz este un serviciu de Inchirieri scule.

De la modul de inserare al clientilor pana la modul in care putem corela datele din 2 table un sistem de baze de date de tip SQL reduce in mod dramatic numarul de ore necesare pentru a putea avea o viziune asupra modului in care un inventar functioneaza.


### Bibliografie
https://dev.mysql.com/doc/
https://www.w3schools.com/php/php_mysql_intro.asp
https://www.php.net/manual/en/function.mysql-query.php
https://startbootstrap.com/theme/sb-admin-2