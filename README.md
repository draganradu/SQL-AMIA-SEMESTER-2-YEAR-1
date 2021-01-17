# Inchiriere de scule Tema Baze de date SQL
#### Student: Radu Dragan

link:
http://fotodex.ro/tema_sql/

### 1. Structura Tabele 
##### Tabela Scule
| ID Scula | Nume scula | Stare | Pret | valoare reziduala | Este Inchiriata | Data achizitie |
| --- | --- | --- | --- | --- | --- | --- | 
| INT 6 uniq auto increment | String 50 | INT 1 | INT 5 | INT 5 | BOOLEAN | DATE  | 

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
| ID CLIENT | Nume Client | Prenume Client | Telefon | Email | 
| --- | --- | --- | --- | --- |
| INT 6 uniq auto increment | String 50 | String 50 | String 10 | String 50 |

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

| ID inchirire | ID Scula | ID Client | Data iesire | Data intrare | IS PAYED | NOTE |
| --- | --- | --- | --- | --- | --- | --- | --- |
| INT 6 uniq auto increment | INT 6 FK | INT 6 FK | DATA | DATA | BOOLEAN | STRING 500 | 

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

### Pagini
#### Lista Scule

*TOATA TABELA 'SCULE'*
```sql
SELECT IdScula, NumeScula, Stare, Pret, ValRezid, IsRented, DataAchizitie FROM scule ORDER BY NumeScula ASC LIMIT 50
```

*Valoarea totala Scule*
```sql
SELECT SUM(Pret) FROM scule
```

*Valoarea medie reziduala scule*
```sql
SELECT AVG(ValRezid) FROM scule
```

*Scule inchiriate*
```sql
SELECT COUNT(IdScula) FROM scule WHERE IsRented = 1
```

*Valoare pierduta catre depreciere*
```sql
SELECT SUM(Pret - ValRezid) FROM scule
```

#### Lista Clienti

*TOATA TABELA 'Client'*
```sql
SELECT idClient, Nume, Prenume, Telefon, email FROM client ORDER BY Nume ASC LIMIT 50
```

*Numar total clienti*
```sql
SELECT COUNT(Nume) FROM client
```

#### Insert Clienti
```sql
INSERT INTO client (Nume, Prenume, Telefon, email) VALUES ('Ionescu','Radu', '0742056799', 'radu@dragan.ro')
```

#### Insert Scule
```sql
INSERT INTO scule (NumeScula, Stare, Pret, ValRezid, IsRented, DataAchizitie) VALUES ('Ciocan Stanley 160Z','5', '8', '6', '1', '1/5/2018')
```


