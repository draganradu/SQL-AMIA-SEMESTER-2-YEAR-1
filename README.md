Inchiriere de scule
http://localhost/bazededate/radu_output/

### Tabele 
Tabela Scule
| ID Scula | Nume scula | Stare | Pret | valoare reziduala | Este Inchiriata | Data achizitie |
| --- | --- | --- | --- | --- | --- | --- | 
| INT 6 uniq auto increment | String 50 | INT 1 | INT 5 | INT 5 | BOOLEAN | DATE  | 
CREATE TABLE scule(
    IdScula int AUTO_INCREMENT PRIMARY KEY,
    NumeScula varchar(50),
    Stare int,
    Pret float(5),
    ValRezid float(5),
    IsRented boolean,
    DataAchizitie date
)

TABELA CLIENT
| ID CLIENT | Nume Client | Prenume Client | Telefon | Email | 
| --- | --- | --- | --- | --- |
| INT 6 uniq auto increment | String 50 | String 50 | String 10 | String 50 |
CREATE TABLE client (
    idClient int PRIMARY KEY AUTO_INCREMENT,
    Nume varchar(50) NOT NULL,
    Prenume varchar(50) NOT NULL,
    Telefon varchar(10) NOT NULL,
    email varchar(50) NOT NULL
)

TABELA INCHIRIERE

| ID inchirire | ID Scula | ID Client | Data iesire | Data intrare | IS PAYED | NOTE |
| --- | --- | --- | --- | --- | --- | --- | --- |
| INT 6 uniq auto increment | INT 6 FK | INT 6 FK | DATA | DATA | BOOLEAN | STRING 500 | 
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

### Pagini
Lista Scule
Lista Clienti
Lista Inchirieri

Lista scule disponibile
Lista clienti care au scule inchiriate
Cerere Inchiriere


