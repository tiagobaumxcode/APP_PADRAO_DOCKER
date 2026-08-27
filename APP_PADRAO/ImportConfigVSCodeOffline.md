# Guia de Backup Offline do VS Code

# 📦 (Configurações e Extensões)

Este documento contém o passo a passo para exportar e restaurar todas as configurações, atalhos e extensões do Visual Studio Code de forma **100% offline**, ideal para ambientes corporativos com restrições de rede ou sem acesso à internet.

---

## 📋 Pré-requisitos

* Um pendrive ou dispositivo de armazenamento externo.
* Acesso ao Terminal (macOS) ou Prompt de Comando / PowerShell (Windows).

---

## 🛠️ Passo 1: Mapear e Exportar as Extensões Instaladas

Como a máquina de destino não tem acesso à internet para baixar as extensões, a melhor abordagem é copiar a pasta física onde o VS Code armazena as extensões instaladas.

### No macOS (Máquina de Origem):
1. Conecte o seu pendrive.
2. Abra o Terminal e execute o comando de cópia:

```bash
cp -R ~/.vscode/extensions /Volumes/NOME_DO_SEU_PENDRIVE/vscode-extensions-backup
````

_(Substitua `NOME_DO_SEU_PENDRIVE` pelo nome correto do dispositivo montado no seu Mac)._

  

### No Windows (Caso a origem seja Windows):

DOS

```
xcopy "%USERPROFILE%\\.vscode\\extensions" "E:\\vscode-extensions-backup" /E /I /H /Y
```

_(Substitua `E:` pela letra referente ao seu pendrive)._

  

## ⚙️ Passo 2: Exportar Configurações do Usuário, Atalhos e Snippets

As personalizações de tema, tamanho de fonte, regras de formatação, atalhos de teclado e snippets personalizados ficam armazenadas em uma pasta separada no sistema operacional.

  

### No macOS (Máquina de Origem):

Abra o Terminal e copie a pasta de configurações do usuário para o seu pendrive:

  

Bash

```
cp -R ~/Library/Application\\ Support/Code/User /Volumes/NOME_DO_SEU_PENDRIVE/vscode-user-backup
```

### No Windows (Caso a origem seja Windows):

DOS

```
xcopy "%APPDATA%\\Code\\User" "E:\\vscode-user-backup" /E /I /H /Y
```

## 📥 Passo 3: Restaurar o Backup na Nova Máquina (100% Offline)

Na máquina de destino (sem acesso à internet), siga estes passos para aplicar o backup:

  

### 1. Restaurar as Extensões

#### No macOS (Máquina de Destino):

Bash

```
mkdir -p ~/.vscode/extensions
cp -R /Volumes/NOME_DO_SEU_PENDRIVE/vscode-extensions-backup/* ~/.vscode/extensions/
```

#### No Windows (Máquina de Destino):

DOS

```
if not exist "%USERPROFILE%\\.vscode\\extensions" mkdir "%USERPROFILE%\\.vscode\\extensions"
xcopy "E:\\vscode-extensions-backup" "%USERPROFILE%\\.vscode\\extensions" /E /I /H /Y
```

### 2. Restaurar as Configurações (`settings.json` e atalhos)

#### No macOS (Máquina de Destino):

Bash

```
mkdir -p ~/Library/Application\\ Support/Code/User
cp -R /Volumes/NOME_DO_SEU_PENDRIVE/vscode-user-backup/* ~/Library/Application\\ Support/Code/User/
```

#### No Windows (Máquina de Destino):

DOS

```
if not exist "%APPDATA%\\Code\\User" mkdir "%APPDATA%\\Code\\User"
xcopy "E:\\vscode-user-backup" "%APPDATA%\\Code\\User" /E /I /H /Y
```

## ⚡ Passo 4: Automação via Scripts (1 Clique)

Para facilitar backups e restaurações recorrentes, você pode criar os scripts abaixo diretamente na raiz do seu pendrive.

  

### 🍎 Para macOS: Script de Backup Automático (`backup_vscode_mac.sh`)

Crie este arquivo na raiz do pendrive:

  

Bash

```
#!/bin/bash
PENDRIVE_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo "🚀 Iniciando backup do VS Code no macOS..."
mkdir -p "$PENDRIVE_DIR/vscode-extensions-backup"
mkdir -p "$PENDRIVE_DIR/vscode-user-backup"

cp -R ~/.vscode/extensions/* "$PENDRIVE_DIR/vscode-extensions-backup/"
cp -R ~/Library/Application\\ Support/Code/User/* "$PENDRIVE_DIR/vscode-user-backup/"

echo "✅ Backup concluído com sucesso em: $PENDRIVE_DIR"
```

_(Para executar no terminal: `chmod +x backup_vscode_mac.sh && ./backup_vscode_mac.sh`)_

  

### 🍎 Para macOS: Script de Restauração Automática (`restore_vscode_mac.sh`)

Bash

```
#!/bin/bash
PENDRIVE_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo "🚀 Restaurando VS Code no macOS..."
mkdir -p ~/.vscode/extensions
mkdir -p ~/Library/Application\\ Support/Code/User

cp -R "$PENDRIVE_DIR/vscode-extensions-backup/"* ~/.vscode/extensions/
cp -R "$PENDRIVE_DIR/vscode-user-backup/"* ~/Library/Application\\ Support/Code/User/

echo "🎉 Restauração concluída com sucesso!"
```

## 🔧 Solução de Problemas Comuns (Troubleshooting)

### 1. Erro de Permissão no macOS ao Copiar Arquivos (`Permission denied`)

No macOS, o Terminal pode solicitar permissão explícita para acessar a pasta `Library/Application Support`.

  

- **Solução:** Vá em **Ajustes do Sistema > Privacidade e Segurança > Acesso Total ao Disco** e habilite a permissão para o aplicativo **Terminal**.
    
      
    

### 2. Extensões não aparecem no VS Code na nova máquina

- Certifique-se de que o VS Code estava **completamente fechado** no momento do backup e da restauração.
    
      
    
- Ajuste as permissões das pastas restauradas no Mac rodando:
    
      
    
    Bash
    
    ```
    chmod -R 755 ~/.vscode/extensions
    ```
    

### 3. Conflito de Atalhos entre macOS e Windows

Ao fazer backup no macOS e restaurar em uma máquina Windows (ou vice-versa):

  

- Modificadores de teclas como `cmd` no arquivo `keybindings.json` precisam ser ajustados para `ctrl` no Windows.
    
      
    

## ✅ Passo 5: Validação Final

1. Abra o Visual Studio Code na nova máquina.
    
      
    
2. Pressione `Cmd + Shift + X` (macOS) ou `Ctrl + Shift + X` (Windows) para abrir a aba de extensões e verificar a lista.
    
      
    
3. Confirme se as configurações visuais (tema, tamanho de fonte) foram aplicadas corretamente.
    
    """
    
      
    



# 📦 Guia de Backup Offline do VS Code (Configurações e Extensões)

Este documento contém o passo a passo para exportar e restaurar todas as configurações, atalhos e extensões do Visual Studio Code de forma **100% offline**, ideal para ambientes corporativos com restrições de rede ou sem acesso à internet.

---

## 📋 Pré-requisitos

* Um pendrive ou dispositivo de armazenamento externo.
* Acesso ao Terminal (macOS) ou Prompt de Comando / PowerShell (Windows).

---

## 🛠️ Passo 1: Mapear e Exportar as Extensões Instaladas

Como a máquina de destino não tem acesso à internet para baixar as extensões, a melhor abordagem é copiar a pasta física onde o VS Code armazena as extensões instaladas.

### No macOS (Máquina de Origem):
1. Conecte o seu pendrive.
2. Abra o Terminal e execute o comando de cópia:

```bash
cp -R ~/.vscode/extensions /Volumes/NOME_DO_SEU_PENDRIVE/vscode-extensions-backup
````

_(Substitua `NOME_DO_SEU_PENDRIVE` pelo nome correto do dispositivo montado no seu Mac)._

  

### No Windows (Caso a origem seja Windows):

DOS

```
xcopy "%USERPROFILE%\.vscode\extensions" "E:\vscode-extensions-backup" /E /I /H /Y
```

_(Substitua `E:` pela letra referente ao seu pendrive)._

  

## ⚙️ Passo 2: Exportar Configurações do Usuário, Atalhos e Snippets

As personalizações de tema, tamanho de fonte, regras de formatação, atalhos de teclado e snippets personalizados ficam armazenadas em uma pasta separada no sistema operacional.

  

### No macOS (Máquina de Origem):

Abra o Terminal e copie a pasta de configurações do usuário para o seu pendrive:

  

Bash

```
cp -R ~/Library/Application\ Support/Code/User /Volumes/NOME_DO_SEU_PENDRIVE/vscode-user-backup
```

### No Windows (Caso a origem seja Windows):

DOS

```
xcopy "%APPDATA%\Code\User" "E:\vscode-user-backup" /E /I /H /Y
```

## 📥 Passo 3: Restaurar o Backup na Nova Máquina (100% Offline)

Na máquina de destino (sem acesso à internet), siga estes passos para aplicar o backup:

  

### 1. Restaurar as Extensões

#### No macOS (Máquina de Destino):

Bash

```
mkdir -p ~/.vscode/extensions
cp -R /Volumes/NOME_DO_SEU_PENDRIVE/vscode-extensions-backup/* ~/.vscode/extensions/
```

#### No Windows (Máquina de Destino):

DOS

```
if not exist "%USERPROFILE%\.vscode\extensions" mkdir "%USERPROFILE%\.vscode\extensions"
xcopy "E:\vscode-extensions-backup" "%USERPROFILE%\.vscode\extensions" /E /I /H /Y
```

### 2. Restaurar as Configurações (`settings.json` e atalhos)

#### No macOS (Máquina de Destino):

Bash

```
mkdir -p ~/Library/Application\ Support/Code/User
cp -R /Volumes/NOME_DO_SEU_PENDRIVE/vscode-user-backup/* ~/Library/Application\ Support/Code/User/
```

#### No Windows (Máquina de Destino):

DOS

```
if not exist "%APPDATA%\Code\User" mkdir "%APPDATA%\Code\User"
xcopy "E:\vscode-user-backup" "%APPDATA%\Code\User" /E /I /H /Y
```

## ⚡ Passo 4: Automação via Scripts (1 Clique)

Para facilitar backups e restaurações recorrentes, você pode criar os scripts abaixo diretamente na raiz do seu pendrive.

  

### 🍎 Para macOS: Script de Backup Automático (`backup_vscode_mac.sh`)

Crie este arquivo na raiz do pendrive:

  

Bash

```
#!/bin/bash
PENDRIVE_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo "🚀 Iniciando backup do VS Code no macOS..."
mkdir -p "$PENDRIVE_DIR/vscode-extensions-backup"
mkdir -p "$PENDRIVE_DIR/vscode-user-backup"

cp -R ~/.vscode/extensions/* "$PENDRIVE_DIR/vscode-extensions-backup/"
cp -R ~/Library/Application\ Support/Code/User/* "$PENDRIVE_DIR/vscode-user-backup/"

echo "✅ Backup concluído com sucesso em: $PENDRIVE_DIR"
```

_(Para executar no terminal: `chmod +x backup_vscode_mac.sh && ./backup_vscode_mac.sh`)_

  

### 🍎 Para macOS: Script de Restauração Automática (`restore_vscode_mac.sh`)

Bash

```
#!/bin/bash
PENDRIVE_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo "🚀 Restaurando VS Code no macOS..."
mkdir -p ~/.vscode/extensions
mkdir -p ~/Library/Application\ Support/Code/User

cp -R "$PENDRIVE_DIR/vscode-extensions-backup/"* ~/.vscode/extensions/
cp -R "$PENDRIVE_DIR/vscode-user-backup/"* ~/Library/Application\ Support/Code/User/

echo "🎉 Restauração concluída com sucesso!"
```

## 🔧 Solução de Problemas Comuns (Troubleshooting)

### 1. Erro de Permissão no macOS ao Copiar Arquivos (`Permission denied`)

No macOS, o Terminal pode solicitar permissão explícita para acessar a pasta `Library/Application Support`.

  

- **Solução:** Vá em **Ajustes do Sistema > Privacidade e Segurança > Acesso Total ao Disco** e habilite a permissão para o aplicativo **Terminal**.
    
      
    

### 2. Extensões não aparecem no VS Code na nova máquina

- Certifique-se de que o VS Code estava **completamente fechado** no momento do backup e da restauração.
    
      
    
- Ajuste as permissões das pastas restauradas no Mac rodando:
    
      
    
    Bash
    
    ```
    chmod -R 755 ~/.vscode/extensions
    ```
    

### 3. Conflito de Atalhos entre macOS e Windows

Ao fazer backup no macOS e restaurar em uma máquina Windows (ou vice-versa):

  

- Modificadores de teclas como `cmd` no arquivo `keybindings.json` precisam ser ajustados para `ctrl` no Windows.
    
      
    

## ✅ Passo 5: Validação Final

1. Abra o Visual Studio Code na nova máquina.
    
      
    
2. Pressione `Cmd + Shift + X` (macOS) ou `Ctrl + Shift + X` (Windows) para abrir a aba de extensões e verificar a lista.
    
      
    
3. Confirme se as configurações visuais (tema, tamanho de fonte) foram aplicadas corretamente.
    
      
    

