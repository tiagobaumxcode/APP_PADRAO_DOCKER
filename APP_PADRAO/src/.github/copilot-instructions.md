# Instruções Globais do Agente para o Projeto

## 1. Economia de Tokens (saída e contexto)
- **Resposta direta ao ponto:** vá direto para o código ou solução técnica. Sem saudações, introduções ("Claro!", "Entendido!") ou conclusões conversacionais.
- **Modificações pontuais:** ao alterar um arquivo existente, edite apenas o método, função ou bloco relevante. Nunca reescreva o arquivo inteiro se a alteração for pontual.
- **Sem explicações desnecessárias:** forneça apenas o código PHP/Blade funcional. Adicione explicações teóricas apenas se solicitado explicitamente.
- **Leitura restrita:** considere apenas os arquivos mencionados diretamente com `#file` ou atrelados à tarefa atual. Nunca ler `vendor/`, `node_modules/`, `storage/logs/`, `storage/framework/`, `bootstrap/cache/`, `.git/`.
- **Sem `cat` de arquivos grandes:** usar `grep -n` para localizar o trecho relevante antes de abrir; ao investigar um bug, pedir/gerar só o trecho da classe/método envolvido.
- **Migrations e seeders:** ao pedir ajuda, colar só a migration relevante (não o histórico completo). Para seeders grandes (listas de exercícios, CEPs etc.), gerar o arquivo diretamente em vez de exibir o array inteiro na conversa antes de salvar.
- **Git:** para revisão, mandar o diff (`git diff`) em vez do arquivo inteiro quando a mudança for pontual; usar `git status` / `git diff --stat` para visão geral antes do diff completo.

## 2. Stack Tecnológica e Convenções
- **Linguagem & Framework:** PHP 8.3+, Laravel 13+.
- **Estilo de Código:** siga rigorosamente PSR-12 e Laravel Pint.
- **Injeção de Dependência:** prefira injeção via construtor ou type-hints nativos em métodos.
- **Tratamento de Dados:** use `FormRequest` para validações e `Actions`/`Services` para regras de negócio complexas. Não sobrecarregue Controllers.

## 3. Padrão de Testes
- **Framework:** Pest PHP (nunca PHPUnit tradicional, a menos que solicitado).
- **Estrutura:** padrão AAA (Arrange, Act, Assert).
- **Namespaces:** testes de Feature para endpoints/controllers; testes Unitários para Actions/Services.
- **Execução:** rodar filtrado (`php artisan test --filter=NomeDoTeste`) em vez da suíte inteira quando só uma parte mudou; usar `--stop-on-failure`.

## 4. Banco de Dados e Migrations
- **Migrations:** nomes de tabelas no plural; convenções padrão de FK do Laravel (`foreignId('user_id')->constrained()`).
- **Models:** definir `$fillable`, relacionamentos tipados e casts nativos do PHP.
- **Conferência:** usar `php artisan migrate:status` em vez de reexecutar migrations só para conferir.

## 5. Logs e Debug
- Evitar `tail -f` ou logs completos; usar `tail -n 50 storage/logs/laravel.log | grep -i error`.
- Em exceptions, pedir só o stack trace relevante (classe/linha do seu código), não o dump inteiro do framework.
- Preferir `dd()`/`dump()` pontual em vez de dump de objetos Eloquent completos (relations carregadas geram saída enorme).

## 6. Docker
- `docker compose logs` sempre com `--tail=N` e filtro de serviço (ex: `docker compose logs app --tail=50`), nunca sem limite.
- Evitar `docker inspect` completo; usar `--format` para extrair só o campo necessário.

## 7. Ferramentas de Terceiros
- Ferramentas como o RTK (Rust Token Killer) filtram automaticamente saída de comandos (git, composer, testes) antes de chegar ao contexto do agente — camada extra, mas as regras acima já cobrem a maior parte do ganho.