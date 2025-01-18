import IngredientsTable from "../../components/ingredients-table"

export default function IngredientsPage() {
  return (
    <div className="container mx-auto py-8 px-4">
      <h1 className="text-3xl font-bold mb-6">食材データベース</h1>
      <IngredientsTable />
    </div>
  )
}

