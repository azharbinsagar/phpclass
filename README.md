# Sample data (replace this with your actual data)
files = [
    {"file_name": "file1.txt", "description": "Sample text file", "last_modified": "2023-08-05", "download_link": "https://example.com/file1"},
    {"file_name": "image.jpg", "description": "Sample image file", "last_modified": "2023-08-03", "download_link": "https://example.com/image"},
    {"file_name": "document.docx", "description": "Sample Word document", "last_modified": "2023-08-04", "download_link": "https://example.com/docx"},
]

# Generate the Markdown table
table_md = "| File Name       | Description               | Last Modified   | Download Link                        |\n|-----------------|---------------------------|-----------------|--------------------------------------|\n"
for file_info in files:
    table_md += f"| {file_info['file_name']} | {file_info['description']} | {file_info['last_modified']} | [Download]({file_info['download_link']}) |\n"

# Write the Markdown table to the README.md file
with open("README.md", "w") as readme_file:
    readme_file.write(table_md)
