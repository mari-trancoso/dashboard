# Dashboard da Obra

Este é um projeto de dashboard para acompanhar dados relacionados a uma obra. Ele inclui gráficos interativos para materiais e resíduos, além de funcionalidades para atualizar e adicionar dados.

## Como Usar

1. **Dados da Obra:**
   - **Tempo Estimado:** Mostra o tempo estimado para a conclusão da obra.
   - **Trabalhadores:** Exibe o número atual de trabalhadores.

2. **Atualizar Dados:**
   - Use o formulário para inserir novos valores para o tempo estimado e o número de trabalhadores.
   - Clique no botão "Atualizar Gráfico" para ver as alterações refletidas nos gráficos.

3. **Gráfico de Materiais por Mês:**
   - Adicione dados de materiais usando o formulário.
   - O gráfico mostra a distribuição dos valores de materiais ao longo do tempo.

4. **Adicionar Dados de Resíduo:**
   - Insira dados de resíduos usando o formulário correspondente.
   - O gráfico exibe a quantidade de resíduos de diferentes classes em cada mês.

<img width="944" alt="image" src="https://github.com/mari-trancoso/dashboard/assets/111318815/7a608c06-6721-47a9-b945-b227b18fe9ea">

## Como baixar localmente

1. **Instalação:**
   - Clone o repositório para o seu ambiente local:

2. **Configuração:**
   - Navegue até o diretório do projeto:
     ```bash
     cd dashboard-da-obra
     ```
   - Instale as dependências usando o Composer:
     ```bash
     composer install
     ```

3. **Inicialização do Servidor PHP:**
   - Execute o seguinte comando para iniciar o servidor PHP:
     ```bash
     php artisan serve
     ```
   - O servidor estará disponível em `http://localhost:8000`.

4. **Acesso ao Dashboard:**
   - Abra seu navegador e acesse `http://localhost:8000` para visualizar o dashboard.

5. **Atualizar e Adicionar Dados:**
   - Use os formulários fornecidos para atualizar e adicionar dados conforme necessário.




