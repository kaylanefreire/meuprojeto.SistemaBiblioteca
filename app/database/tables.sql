DROP TABLE IF EXISTS autores_livros;

CREATE TABLE IF NOT EXISTS autores_livros (
    id              INTEGER PRIMARY KEY,
    autor           TEXT    NOT NULL,
    dataNascimento  TEXT,
    email           TEXT    NOT NULL
);

INSERT INTO autores_livros (id, autor, dataNascimento, email) values (1,'teste 1','01-01-2000', 't1@gmail.com');
INSERT INTO autores_livros (id, autor, dataNascimento, email) values (2,'teste 2','01-01-2001', 't2@gmail.com');
INSERT INTO autores_livros (id, autor, dataNascimento, email) values (3,'teste 3','01-01-2003', 't3@gmail.com');

DROP TABLE IF EXISTS livros;

CREATE TABLE IF NOT EXISTS livros (
    id               INTEGER PRIMARY KEY,
    titulo           TEXT    NOT NULL,
    genero           TEXT,
    autor_id         TEXT,
    anopublicacao    INTEGER,

/* definicao de chave estrangeira */
    FOREIGN KEY (autor_id)
       REFERENCES autores_livros (id)
);

DROP TABLE IF EXISTS usuarios; 

CREATE TABLE IF NOT EXISTS usuarios (
    id               INTEGER PRIMARY KEY,
    nome             TEXT NOT NULL,
    dataNascimento   TEXT,
    email            TEXT NOT NULL
);

DROP TABLE IF EXISTS emprestimo_livros;

CREATE TABLE IF NOT EXISTS emprestimo_livros (
    id      INTEGER    PRIMARY KEY,
    usuario_id TEXT    NOT NULL,
    livro_id   TEXT    NOT NULL,

    /* definicao de chave estrangeira */
    FOREIGN KEY (usuario_id)
       REFERENCES usuarios (id),
    FOREIGN KEY (livro_id)
       REFERENCES livros (id)
);
