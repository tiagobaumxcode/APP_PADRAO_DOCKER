# Instruções Globais do Agente para o Projeto

## 1. Regras de Economia de Tokens (SAÍDA E CONTEXTO)
- **Resposta direta ao ponto:** Vá direto para o código ou solução técnica. Não inclua saudações, introduções ("Claro!", "Entendido!") ou conclusões conversacionais.
- **Modificações pontuais:** Ao alterar um arquivo existente, edite apenas o método, função ou bloco relevante. Nunca reescreva o arquivo inteiro se a alteração for pontual.
- **Sem explicações desnecessárias:** Forneça apenas o código PHP/Blade funcional. Adicione explicações teóricas apenas se o usuário solicitar explicitamente no prompt.
- **Leitura restrita:** Considere apenas os arquivos mencionados diretamente com `#file` ou atrelados à tarefa atual.

## 2. Stack Tecnológica e Convenções
- **Linguagem & Framework:** PHP 8.3+, Laravel 13+.
- **Estilo de Código:** Siga rigorosamente as convenções do PSR-12 e Laravel Pint.
- **Injeção de Dependência:** Prefira Injeção de Dependência via construtor ou declarações de tipos nativas em métodos.
- **Tratamento de Dados:** Use `FormRequest` para validações e `Actions` ou `Services` para regras de negócio complexas. Não sobrecarregue Controllers.

## 3. Padrão de Testes
- **Framework de Testes:** Utilize **Pest PHP** (nunca PHPUnit tradicional, a menos que solicitado).
- **Estrutura de Testes:** Siga o padrão AAA (Arrange, Act, Assert).
- **Namespaces:** Utilize testes de Feature para endpoints/controllers e testes Unitários para Actions/Services.

## 4. Banco de Dados e Migrations
- **Migrations:** Escreva migrations usando nomes de tabelas no plural e convenções padrão de chave estrangeira do Laravel (`foreignId('user_id')->constrained()`).
- **Models:** Defina `$fillable`, relacionamentos tipados e casts nativos do PHP.